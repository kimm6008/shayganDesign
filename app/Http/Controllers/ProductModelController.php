<?php

namespace App\Http\Controllers;

use App\Http\SettingHelper;
use App\Models\languages;
use App\Models\product_group_tr;
use App\Models\product_model;
use App\Models\product_model_tr;
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

        $faLangID = \App\Http\SettingHelper::getFaLangID();
        $enLangID = \App\Http\SettingHelper::getEnLangID();

        $product_models = product_model::with(['product_model_translation', 'product_group.product_group_tr'])->get()
            ->map(function ($productModel) use ($faLangID, $enLangID) {
            return [
                'id' => $productModel->id,
                'imgPath' => $productModel->imgPath,
                'enable' => $productModel->enable,
                'fa_name' => $productModel->product_model_translation->where('languages_id', $faLangID)->first()?->name ?? 'N/A',
                'en_name' => $productModel->product_model_translation->where('languages_id', $enLangID)->first()?->name ?? 'N/A',
                'fa_group_name' => $productModel->product_group->product_group_tr->where('languages_id', $faLangID)->first()?->name ?? 'N/A',
                'en_group_name' => $productModel->product_group->product_group_tr->where('languages_id', $enLangID)->first()?->name ?? 'N/A',
            ];
        });
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
            $result = SettingHelper::upload_file($file, 'Public/ProductModelImage', 1024);
            if($result=="ExtentionNotValid")
                return SettingHelper::RedirectWithErrorMessage('ProductModels',  "پسوند فایل مجاز نیست");
            if($result=="MaxSizeExceeded")
                return SettingHelper::RedirectWithErrorMessage('ProductModels',  "حجم فایل بیش از حد مجاز است");
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
                } catch (\Exception $exception) {
                    DB::rollBack();
                    return SettingHelper::RedirectWithErrorMessage('ProductModels', $exception->getMessage());
                }
                DB::commit();
                return SettingHelper::RedirectWithSuccessMessage('ProductModels', 'مدل محصول با موفقیت اضافه شد');
            }
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
