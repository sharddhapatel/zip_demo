<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use ZipArchive;
use Image;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller
{
    public function productimg(Request $request)
    {
        $file = new Filesystem;
        $file->cleanDirectory('item_img');
        $fileName = 'myNewFile.zip';
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        $files = $request->file('myfile');
        foreach ($files as $file) {
            $imageDimensions = getimagesize($file);
            $width = $imageDimensions[0];
            $height = $imageDimensions[1];
            $new_width = $imageDimensions[0] * 0.7;
            $new_height = ceil($height * ($new_width / $width));

            $name = $file->getClientOriginalName();
            $t = time() . $name;
            $img = explode(".", $t);
            $path = public_path('item_img');
            // $file->move(public_path('item_img'), $t);
            // $invoice_file[] = $t;
            $imgx = Image::make($file->getRealPath());
            $imgx->resize($new_width, $new_height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $t);
        }
        return redirect()->back()->with("message", "Insert Sucessfully...");
    }
    public function downloadZip(Request $request)
    {
        $zip = new ZipArchive;
        $fileName = 'myNewFile.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $filess = File::files(public_path('item_img'));
            foreach ($filess as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
            // Storage::disk('public')->url($downloadZip->zip);
            // return $zip->myNewFile->storeAs('public', 'downloadZip');
        }
        return response()->download(public_path($fileName));
    }

    // public function show()
    // {
    //    return Storage::size('public/item_img');
    // }
}
