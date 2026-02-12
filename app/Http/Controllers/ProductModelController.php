<?php

namespace App\Http\Controllers;

use App\Http\SettingHelper;
use App\Models\languages;
use App\Models\product_gallery;
use App\Models\product_group_tr;
use App\Models\product_model;
use App\Models\product_model_tr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductModelController extends Controller
{
    public function index()
    {
        $page_header='مدیریت مدل های محصولات';
        $languages=languages::all();
        $product_groups_tr=product_group_tr::whereLanguagesId(SettingHelper::getFaLangID())->get();

        $product_models = product_model::FetchAllModels();
        return view('profile.admin.ManageModels',compact('languages','page_header'
            ,'product_groups_tr','product_models'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        if ($request->hasFile("img")) {
            $file = $request->file("img");
            $result = SettingHelper::upload_file($file, 'ProductModelImage', 10240);
            if($result=="ExtentionNotValid")
                return SettingHelper::RedirectWithErrorMessage('profile/admin/ProductModels',  "پسوند فایل مجاز نیست");
            if($result=="MaxSizeExceeded")
                return SettingHelper::RedirectWithErrorMessage('profile/admin/ProductModels',  "حجم فایل بیش از حد مجاز است");
            if ($result) {
                DB::beginTransaction();
                try {
                    $languages = languages::all();
                    $pm = product_model::create([
                        'imgPath' => $result,
                        'uuid' => Str::uuid(),
                        'product_group_id' => $request->product_group_id,
                    ]);
                    foreach ($languages as $language) {
                        $data[] = [
                            'languages_id' => $language->id,
                            'product_model_id' => $pm->id,
                            'name' => $request[$language->lang_code . '_name'],
                        ];
                    }
                    product_model_tr::insert($data);
                } catch (Exception $exception) {
                    DB::rollBack();
                    return SettingHelper::RedirectWithErrorMessage('profile/admin/ProductModels', $exception->getMessage());
                }
                DB::commit();
                return SettingHelper::RedirectWithSuccessMessage('profile/admin/ProductModels', 'مدل محصول با موفقیت اضافه شد');
            }
        }
    }

    public function show($id)
    {

    }

    public function edit(product_model $product_model)
    {
        $languages=languages::all();
        $page_header='ویرایش مدل ' . $product_model->product_model_translation()->whereLanguagesId(SettingHelper::getFaLangID())->first()->name;
        $product_groups_tr=product_group_tr::whereLanguagesId(SettingHelper::getFaLangID())->get();
        return view('profile.admin.EditProductModel',compact('languages','product_model'
        ,'page_header','product_groups_tr'));
    }

    public function update(Request $request, product_model $product_model)
    {
        DB::beginTransaction();
        try {
            $product_model->update([
                'enable' => $request->enable == 'on' ? 1 : 0
            ]);
            $result = null;
            if ($request->hasFile("img")) {
                $file = $request->file("img");
                $result = SettingHelper::upload_file($file, 'ProductModelImage', 10240);
                if ($result == "ExtentionNotValid")
                    return SettingHelper::RedirectWithErrorMessage('profile/admin/ProductModels', "پسوند فایل مجاز نیست");
                if ($result == "MaxSizeExceeded")
                    return SettingHelper::RedirectWithErrorMessage('profile/admin/ProductModels', "حجم فایل بیش از حد مجاز است");
            }
            if ($result != null) {
                $product_model->update([
                    'imgPath' => $result,
                ]);
            }

            $product_model->update([
                'product_group_id' => $request->product_group_id,
            ]);
            $product_model->product_model_translation()->delete();
            $languages = languages::all();
            foreach ($languages as $language) {
                $data[] = [
                    'product_model_id' => $product_model->id,
                    'languages_id' => $language->id,
                    'name' => $request[$language->lang_code . '_name'],
                ];
            }
            product_model_tr::insert($data);

        } catch (Exception $exception) {
            DB::rollBack();
            return SettingHelper::RedirectWithErrorMessage('profile/admin/ProductModels', $exception->getMessage());
        }
        DB::commit();
        return SettingHelper::RedirectWithSuccessMessage('profile/admin/ProductModels', 'مدل با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
    }

    public function apiGetProductModelInfo(Request $request)
    {
        $uuid = $request->query('uuid');

        if($uuid != null)
            $product_models=product_model::where('uuid',$uuid)->with(['product_model_translation','products','products.translation'])->get();
        else
            $product_models=product_model::with(['product_model_translation','products','products.translation'])->get();
        $models = [];
        foreach ($product_models as $model) {
            $model_info = [];
            foreach ($model->product_model_translation as $tr) {
                $lang = $tr->languages->lang_code;
                $model_info[$lang] = [
                    'ModelTitle' => $tr->name,
                ];
            }

            $latest_products = $model->products->take(10)->map(function ($product) {
                // ترجمه‌های هر محصول
                $product_translations = [];
                foreach ($product->translation as $ptr) {
                    $lang = $ptr->languages->lang_code;
                    $product_translations[$lang] = [
                        'title' => $ptr->name,
                        'description' => $ptr->description ?? null,
                    ];
                }
                $price=ProductController::GetProductPrice($product->id);
                $discount=ProductController::GetProductDiscount($product->id);
                $gallery = product_gallery::where(['product_id' => $product->id , 'isMainImage' => false])->get(['id','imgPath']);
                return [
                    'id' => $product->id,
                    'uuid' => $product->uuid,
                    'enable' => $product->enable,
                    'imgPath' => $product->Gallery()->first()->imgPath,
                    'gallery'=> $gallery,
                    'Price'=> $price?->price,
                    'Currency'=> $price?->currency->name,
                    'Discount' => $discount['discount'] ?? 0,
                    'translations' => $product_translations,
                ];
            });

            $models[] = [
                'id' => $model->id,
                'uuid' => $model->uuid,
                'enable' => $model->enable,
                'imgPath' => $model->imgPath,
                'info' => $model_info,
                'latestProducts' => $latest_products->values(),
            ];
        }


        return response()->json($models);
    }
}
