<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Http\SettingHelper;
use App\Models\languages;
use App\Models\product;
use App\Models\product_gallery;
use App\Models\product_group;
use App\Models\product_group_tr;
use App\Models\product_model;
use App\Models\product_model_tr;
use App\Models\product_price;
use App\Models\product_tr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $page_header='مدیریت محصولات';
        $products=product::GetProductFullInfo();
        return view('profile.admin.ManageProducts',compact('page_header','products'));
    }

    public function create()
    {
        $page_header='تعریف محصول';
        $product_groups=product_group_tr::whereLanguagesId(SettingHelper::getFaLangID())->get();
        $first_model=ProductGroupController::fetch_product_group_model($product_groups->first->get('id'));
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
            $result = SettingHelper::upload_file($file, 'ProductImage', 1024);
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
                        'enable' => true,
                        'color_code'=>$request->color
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
                }catch (Exception $exception)
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
        $product=product::GetProductFullInfo()->firstWhere('uuid',$id);
        $gallery=product::firstWhere('uuid',$id)->gallery()->orderBy('id')->get();
        $price=$this->GetProductPrice($product['id']);
        $features=product::firstWhere('uuid',$id)->GetFeaturesWithValus();
        return view('sections.products',compact('product','gallery','price','features'));
    }

    public function edit($id)
    {
        $product=product::GetProductFullInfo()->where('uuid',$id)->first();
        $page_header= "ویرایش محصول " . $product['fa_name'];
        $product_groups=product_group_tr::whereLanguagesId(SettingHelper::getFaLangID())->get();
        $product_group_models=ProductGroupController::fetch_product_group_model($product['product_group_id']);
        $product_model_id=array();
        $languages=languages::all();
        foreach ($product_group_models->product_models as $item) {
            $product_model_id[] = $item->id;
        }
        $group_models=product_model_tr::whereLanguagesId(SettingHelper::getFaLangID())
            ->whereIn('product_model_id',$product_model_id)->get();
        return view('profile.admin.EditProduct',compact('product','languages','page_header'
                                                    ,'product_groups','group_models'));
    }

    public function update(Request $request, $id)
    {
        $product = product::where('uuid', $id)->first();

        DB::beginTransaction();
        try {
            if ($request->hasFile("img")) {
                $file = $request->file("img");
                $result = SettingHelper::upload_file($file, 'ProductImage', 1024);
                if ($result == "ExtentionNotValid")
                    return SettingHelper::RedirectWithErrorMessage('Product', "پسوند فایل مجاز نیست");
                if ($result == "MaxSizeExceeded")
                    return SettingHelper::RedirectWithErrorMessage('Product', "حجم فایل بیش از حد مجاز است");
                product_gallery::where(['product_id' => $product->id, 'isMainImage' => true])->
                update([
                    'imgPath' => $result,
                ]);
            }
            $product->update([
                'product_group_id' => $request->product_group_id,
                'product_model_id' => $request->product_model_id,
                'enable' => $request->enable == 'on' ? 1 : 0,
                'is_selective' => $request->is_selective == 'on' ? 1 : 0,
                'color_code'=>$request->color
            ]);
            $product->translation()->delete();
            $languages = languages::all();
            foreach ($languages as $language) {
                $data[] = [
                    'languages_id' => $language->id,
                    'product_id' => $product->id,
                    'name' => $request[$language->lang_code . '_name'],
                    'description' => $request[$language->lang_code . '_desc'],
                ];
            }
            product_tr::insert($data);
        } catch (Exception $exception) {
            DB::rollBack();
            return SettingHelper::RedirectWithErrorMessage('Products', $exception->getMessage());
        }
        DB::commit();
        return SettingHelper::RedirectWithSuccessMessage('Products', ' محصول با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = product::find($id);
            $product->delete();
        }catch (Exception $exception)
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
    public static function GetProductPrice($id)
    {
        return product_price::with(['currency'])->where('product_id',$id)
            ->whereNull('toDate')->first();
    }
    public static function GetProductDiscount($id)
    {
        return array([
            'discount'=>0
        ]);
    }
    public function apiViewProduct($uuid)
    {
        $product = product::GetProductFullInfo()->where('uuid', $uuid)->first();
        $price = $this->GetProductPrice($product['id']);
        $discount = $this->GetProductDiscount($product['id']);
        $product['price'] = $price?->price;
        $product['currency'] = $price?->currency->name;
        $product['discount'] = $discount['discount'] ?? 0;
        $product['Gallery'] = product_gallery::where(['product_id' => $product['id']])->get();
        $product['features'] = product::firstWhere('id', $product['id'])->GetFeaturesWithValus();
        return response()->json($product);
    }

    public function apiAllProducts()
    {
        $page = request()->query('page', 1);
        $recordCount = request()->query('count', 5);
        $search=request()->query('query', "");
        $maxRecordCount = 20;

        if ($recordCount > $maxRecordCount) {
            $recordCount = $maxRecordCount;
        }

        $totalRecords = product::count();
        $totalPages = ceil($totalRecords / $recordCount);
        $query = Product::GetProductFullInfo();

        if (!empty($search)) {
            $search = trim(request()->query('query', ""), "\"'");
            $query = $query->filter(function ($product) use ($search) {
                return str_contains($product['fa_name'], $search);
            });

        }

        $allProducts = $query
            ->skip(($page - 1) * $recordCount)
            ->take($recordCount)->map(function ($product) {

                $price = $this->GetProductPrice($product['id']);
                $discount = $this->GetProductDiscount($product['id']);
                $product['price'] = $price?->price ?? 0;
                $product['currency'] = $price?->currency->name ?? null;
                $product['discount'] = $discount['discount'] ?? 0;
                // ویژگی‌ها
                $product['features'] = Product::firstWhere('id', $product['id'])->GetFeaturesWithValus();

                return $product;
            })->values();

        return response()->json([
            'current_page'   => $page,
            'record_count'   => $recordCount,
            'total_records'  => $totalRecords,
            'total_pages'    => $totalPages,
            'products'       => $allProducts,
            'search'         => $search,
        ], 200, [], JSON_UNESCAPED_UNICODE);

    }
}
