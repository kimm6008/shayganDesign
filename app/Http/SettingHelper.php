<?php

namespace App\Http;

use App\Models\languages;
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
        return str_replace('Public','Storage',$img->store($Path));

    }

    private static function isFileTypeValid($file): bool
    {
        if ( $file->extension() == "jpg" || $file->extension() == "png" || $file->extension() == "jpeg")
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
    public static function DeleteImage($imagePath)
    {
        if (Storage::exists($imagePath))
            Storage::delete($imagePath);
    }
    public static function ConvertToEnglishNumber($date)
    {
        $persian_numbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persian_numbers, $english_numbers, $date);
    }
}
