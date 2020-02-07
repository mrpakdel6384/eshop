<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Carbon\Exceptions\BadUnitException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index(){
        return view('Admin.panel');
    }

    public function uploadImageSubject(Request $request)
    {
        $this->validate(request() , [
            'upload' => 'required|mimes:jpeg,png,bmp',
        ]);
         $year = Carbon::now()->year;
        $imagePath = "/upload/cke/images/{$year}/";
        $file = request()->file('upload');
        $fileName = $file->getClientOriginalName();

        if(file_exists(public_path($imagePath . $fileName))){
            $fileName = Carbon::now()->timestamp . $fileName;
        }

        $file->move(public_path($imagePath) , $fileName);
        $url = $imagePath.$fileName;
        return "<script>window.parent.CKEDITOR.tools.callFunction(1,'{$url}','')</script>";
    }
}
