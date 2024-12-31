<?php

namespace App\Http\Controllers;

use App\Http\SettingHelper;
use App\Models\feature;
use App\Models\features_tr;
use App\Models\languages;
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
            $feature = feature::create();
            foreach ($languages as $language) {
                $data[] = [
                    'languages_id' => $language->id,
                    'feature_id' => $feature->id,
                    'name' => $request[$language->lang_code . '_name'],
                ];
            }
            features_tr::insert($data);
        } catch (\Exception $exception) {
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
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
