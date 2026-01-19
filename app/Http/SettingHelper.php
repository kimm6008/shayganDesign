<?php

namespace App\Http;

use App\Models\languages;
use File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class SettingHelper
{
    public static function getFaLangID()
    {
        return languages::where('lang_code', 'fa')->first()->id;
    }

     public static function getEnLangID()
     {
         return languages::where('lang_code','en')->first()->id;
     }

    public static function RedirectWithSuccessMessage($url, $message)
    {
        return redirect($url)->with('success_msg', $message);
    }

    public static function RedirectWithErrorMessage($url, $message)
    {
        return redirect($url)->with('error_msg', $message);
    }

    public static function upload_file($img, $Path, $fileMaxSize)
    {

        if (!self::isFileTypeValid($img))
            return "ExtentionNotValid";
        if (!self::isFileSizeValid($img, $fileMaxSize))
            return "MaxSizeExceeded";
        $upload_path=$img->store($Path);
        File::move(storage_path('app/'.$upload_path),'upload_images'.'/'.$upload_path);
        return 'upload_images/'.$upload_path;
    }

    private static function isFileTypeValid($file): bool
    {
        if ( $file->extension() == "jpg"
            || $file->extension() == "png"
            || $file->extension() == "jpeg"
            || $file->extension() == "pdf"
            || $file->extension() == "mp4"
            || $file->extension() == "mkv"
        )
            return true;
        return false;
    }

    private static function isFileSizeValid($file, $maxSize): bool
    {
        $sizeInMegabyte = $file->getSize() / 1024;
        if ($sizeInMegabyte > $maxSize)
            return false;
        return true;
    }
    public static function DeleteImage($imagePath) : bool
    {
        $fullPath=str_replace("laravel/public","public_html",public_path($imagePath));
        if (File::exists($fullPath))
            return File::delete($fullPath);
        else
            return false;
    }
    public static function ConvertToEnglishNumber($date)
    {
        $persian_numbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persian_numbers, $english_numbers, $date);
    }
    public static function ConvertToPersianNumber($number)
    {
        $persian_numbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($english_numbers,$persian_numbers, $number);
    }
    public static function ClearCache()
    {
        Cache::forget('productGroups');
        Cache::forget('slideshows');
        Cache::forget('site_title');
    }
}
