<?php

namespace App\Http\Controllers;

use App\Models\DataWeb;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class DataWebController extends Controller
{
    public function DataWeb()
    {
        $web = DataWeb::find(1);

        return view('server.data.web', [
            "data" => $web
        ]);
    }

    public function updateDataWeb(Request $req)
    {
        $id = $req->id;
        
        if($req->file('logo'))
        {
            $image = $req->file('logo');
            $manager = new ImageManager(new Driver());
            $name_generator = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($req->file('logo'));
            $img->resize(1500, 386);
            $img->toJpeg(80)->save(base_path('public/images/logo/'.$name_generator));
    
            $save_url = 'images/logo/'.$name_generator;

            DataWeb::findOrFail($id)->update([
                "nomor"=> $req->nomor,
                "email" => $req->email,
                "copyright" => $req->copyright,
                "alamat" => $req->alamat,
                "logo" => $save_url,
                "updated_at" => Carbon::now()
            ]);
    
            session()->flash('success', 'Data web edited successfully');
    
        } else {
            
            DataWeb::findOrFail($id)->update([
                "nomor"=> $req->nomor,
                "email" => $req->email,
                "copyright" => $req->copyright,
                "alamat" => $req->alamat,
                "updated_at" => Carbon::now()
            ]);
    
            session()->flash('success', 'Data web edited successfully');
    
            return redirect()->back();
        }
            return redirect()->back();
    }
}
