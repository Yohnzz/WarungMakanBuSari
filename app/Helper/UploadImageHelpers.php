<?php
namespace App\Helper;

class UploadImageHelpers
{
    public static function upload($file, $folder = 'menu')
    {
        if (!$file) {
            return null;
        }

        // bikin nama random biar gak bentrok
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // simpan ke storage/app/public/menu
        $path = $file->storeAs('public/' . $folder, $filename);

        // return path yang bisa diakses
        return str_replace('public/', 'storage/', $path);
    }
}
