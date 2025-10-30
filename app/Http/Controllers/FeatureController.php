<?php

namespace App\Http\Controllers;

use App\Http\SettingHelper;
use App\Models\feature;
use App\Models\features_tr;
use App\Models\languages;
use App\Models\product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    public function index()
    {
        $languages = languages::all();
        $features = feature::all();
        $page_header = "مشخصات محصولات";
        return view('profile.admin.ManageFeatures'
            , compact('languages', 'features', 'page_header'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $languages = languages::all();
            $feature = feature::create([
                'isColor'=>$request->isColor == 'on' ? 1 : 0,
            ]);
            foreach ($languages as $language) {
                $data[] = [
                    'languages_id' => $language->id,
                    'feature_id' => $feature->id,
                    'name' => $request[$language->lang_code . '_name'],
                ];
            }
            features_tr::insert($data);
        } catch (Exception $exception) {
            DB::rollBack();
            return SettingHelper::RedirectWithErrorMessage('Feature', $exception->getMessage());
        }
        DB::commit();
        return SettingHelper::RedirectWithSuccessMessage('Feature', 'مشخصه با موفقیت اضافه شد');
    }

    public function create()
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $feature = feature::find($id);
        $languages = languages::all();
        return view('profile.admin.ViewFeatureEditForm'
            , compact('languages', 'feature'));
    }

    public function update(feature $feature, Request $request)
    {
        if($feature->featureValues()->exists())
            return SettingHelper::RedirectWithErrorMessage('Feature', "امکان وبرایش ویژگی استفاده شده در محصول وجود ندارد");

        DB::beginTransaction();
        try {
            feature::where('id', $feature->id)->update([
                'isColor'=>$request->isColor == 'on' ? 1 : 0,
            ]);
            $feature->translations()->delete();
            $languages = languages::all();
            foreach ($languages as $language) {
                $date[]=[
                    'languages_id' => $language->id,
                    'feature_id' => $feature->id,
                    'name' => $request[$language->lang_code . '_name']
                ];
            }
            features_tr::insert($date);
        }catch (Exception $exception) {
            DB::rollBack();
            return SettingHelper::RedirectWithErrorMessage('Feature', $exception->getMessage());
        }
        DB::commit();
        return SettingHelper::RedirectWithSuccessMessage('Feature', "ویژگی با موفقیت ویرایش شد");
    }

    public function destroy($id)
    {

    }
}
