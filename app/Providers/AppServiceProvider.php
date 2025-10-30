<?php

namespace App\Providers;

use App\Http\SettingHelper;
use App\Models\product_group;
use App\Models\site_setting;
use App\Models\slide_show;
use Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //$slideshows = slide_show::GetSlideShowWithProductInfo();
        $site_title = site_setting::whereLanguagesId(SettingHelper::getFaLangID())->first()->site_title;
        $productGroupsWithModel = Cache::rememberForever('productGroups', function () {
            return product_group::with(['product_models.product_model_translation' => function ($query) {
                $query->where('languages_id', SettingHelper::getFaLangID())
                    ->select('product_model_id', 'name');
            }], with(['translation' => function ($query) {
                $query->where('languages_id', SettingHelper::getFaLangID());
            }]))->get();

        });
        SettingHelper::ClearCache();
        View::share(['productGroups' => $productGroupsWithModel
                //, 'slideshows' => $slideshows
                , 'site_title' => $site_title]
        );

    }
}
