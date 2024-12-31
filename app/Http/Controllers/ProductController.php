<?php

namespace App\Http\Controllers;

use App\Http\SettingHelper;
use App\Models\languages;
use App\Models\product;
use App\Models\product_gallery;
use App\Models\product_group;
use App\Models\product_group_tr;
use App\Models\product_model;
use App\Models\product_model_tr;
use App\Models\product_tr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $page_header='مدیریت محصولات';
        $faLangID = SettingHelper::getFaLangID();
        $enLangID = SettingHelper::getEnLangID();
        $products=product::with(['translation','Gallery','product_model.product_model_translation', 'product_group.product_group_tr'])->get()
            ->map(function (product $product) use ($faLangID, $enLangID){
                return [
                    'id'=>$product->id,
                    'uuid'=>$product->uuid,
                    'enable'=>$product->enable,
                    'fa_name'=>$product->translation->where('languages_id',$faLangID)->first()->name,
                    'en_name'=>$product->translation->where('languages_id',$enLangID)->first()->name,
                    'fa_group_name'=>$product->product_group->product_group_tr->where('languages_id',$faLangID)->first()->name,
                    'en_group_name'=>$product->product_group->product_group_tr->where('languages_id',$enLangID)->first()->name,
                    'fa_model_name'=>$product->product_model->product_model_translation->where('languages_id',$faLangID)->first()->name,
                    'en_model_name'=>$product->product_model->product_model_translation->where('languages_id',$enLangID)->first()->name,
                    'main_image'=>$product->Gallery->where('isMainImage',1)->first()?->imgPath ?? ''
                ];
            });
        return view('profile.admin.ManageProducts',compact('page_header','products'));
    }

    public function create()
    {
        $page_header='تعریف محصول';
        $product_groups=product_group_tr::whereLanguagesId(SettingHelper::getFaLangID())->get();
        $first_model=ProductGroupController::fetch_product_group_model($product_groups->first()->get('id'));
        $product_model_id=array();
        $languages=languages::all();
        foreach ($first_model as $item) {
            $product_model_id[] = $item->product_models()->get('id');
        }

        $group_models=product_model_tr::whereLanguagesId(SettingHelper::getFaLangID())
                                        ->whereIn('product_model_id',$product_model_id[0])->get();

        return view('profile.admin.CreateProduct'
            ,compact('page_header','product_groups','group_models','languages'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile("img")) {
            $file = $request->file("img");
            $result = SettingHelper::upload_file($file, 'Public/ProductImage', 1024);
            if($result=="ExtentionNotValid")
                return SettingHelper::RedirectWithErrorMessage('Product',  "پسوند فایل مجاز نیست");
            if($result=="MaxSizeExceeded")
                return SettingHelper::RedirectWithErrorMessage('Product',  "حجم فایل بیش از حد مجاز است");
            if($result)
            {
                DB::beginTransaction();
                try {
                    $languages = languages::all();
                    $pd=product::create([
                        'uuid' => Str::uuid(),
                        'product_group_id' => $request->product_group_id,
                        'product_model_id' => $request->product_model_id,
                        'enable' => true
                    ]);
                    foreach ($languages as $language) {
                        $data[] = [
                            'languages_id' => $language->id,
                            'product_id' => $pd->id,
                            'name' => $request[$language->lang_code . '_name'],
                            'description'=>$request[$language->lang_code . '_desc'],
                        ];
                    }
                    product_tr::insert($data);
                    product_gallery::insert([
                        'product_id' => $pd->id,
                        'imgPath' => $result,
                        'isMainImage' => true
                    ]);
                }catch (\Exception $exception)
                {
                    DB::rollBack();
                    return SettingHelper::RedirectWithErrorMessage('Products/create', $exception->getMessage());
                }
                DB::commit();
                return SettingHelper::RedirectWithSuccessMessage('Products', ' محصول با موفقیت اضافه شد');

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
        DB::beginTransaction();
        try {
            $product = product::find($id);
            $product->delete();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return SettingHelper::RedirectWithErrorMessage('Products', $exception->getMessage());
        }
        DB::commit();
        return SettingHelper::RedirectWithSuccessMessage('Products', ' محصول با موفقیت حذف شد');
    }

    public function get_price($id)
    {
        $price=product::find($id)->product_price()->get();
        return view('profile.admin.AddPrice');

    }
}
