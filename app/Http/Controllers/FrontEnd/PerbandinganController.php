<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facilitas;
use App\Models\Item;
use App\Models\Perbandingan;
use App\Models\Saved;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerbandinganController extends Controller
{
   public function BandingItem($id) {
       
        if(Auth::check()) {
            $exists = Perbandingan::where('id_user', Auth::id())->where('id_item', $id)->first();
            $item = Item::findOrFail($id);

            $item_amenity = $item->id_amenity;
            $current_amenity = explode(',', $item_amenity);

            $amenity_names = []; 

            if ($item_amenity !== null) {
                foreach ($current_amenity as $amenity_id) {
                    $amenity = Amenities::find($amenity_id);
                    
                    if ($amenity !== null) {
                        $amenity_name = $amenity->nama;
                        $amenity_names[] = $amenity_name;
                    }
                }
            }

            $fasilitas = Facilitas::where('id_item', $id)->get();


            if(!$exists) {
                Perbandingan::insert([
                    "id_item" => $id,
                    "id_user" => Auth::user()->id,
                    "amenities" => json_encode($amenity_names),
                    "fasilitas" => $fasilitas,
                    "created_at" => Carbon::now()
                ]);

                return response()->json(['success' => 'Saved on your compare list successfully']);
            } else {
                return response()->json(['error' => 'Properti ini sudah disimpan dalam list perbandingan Anda']);
            }
        } else {
            return response()->json(['error' => 'Anda harus login dulu!']);
        }

   }

   public function GetBanding() {
    
        $data = Perbandingan::with('property')->where("id_user", Auth::user()->id)->latest()->get();
        return view('user.dasbor.banding', [
            "perbandingan" => $data
        ]);
   }

   public function HapusItem($id) {

    Perbandingan::where('id_user', Auth::user()->id)->where('id', $id)->delete();
    return response()->json(['success' => 'Removed Successfuly']); 
   }
}
