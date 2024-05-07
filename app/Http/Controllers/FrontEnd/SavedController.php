<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Saved;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    public function SaveItem(Request $req, $id) {
        if(Auth::check()) {
            $exists = Saved::where('id_user', Auth::id())->where('id_item', $id)->first();

            if(!$exists) {
                Saved::insert([
                    "id_item" => $id,
                    "id_user" => Auth::id(),
                    "created_at" => Carbon::now()
                ]);

                return response()->json(['success' => 'Saved Successfuly']);
            } else {
                return response()->json(['error' => 'Properti ini sudah disimpan dalam list Anda']);
            }
        } else {
            return response()->json(['error' => 'Anda harus login dulu!']);
        }
    }

    public function GetTersimpan() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $savedItem = Saved::with('property')->where("id_user", $id)->latest()->get();
        // dd($savedItem);
        
        return view("user.dasbor.tersimpan", [
            "data" => $userData,
            "saved" => $savedItem
        ]);
    }

    public function GetTersimpanData() {
        $id = Auth::user()->id;
        $savedItem = Saved::with('property')->where("id_user", $id)->latest()->get();
        // return view("user.dasbor.tersimpan", [
        //     "saved" => $savedItem
        // ]);
        dd($savedItem);
        return response()->json([
        'saved' => $savedItem, 
        'count' => count($savedItem)]);

    }

    public function UnsaveItem(Request $req, $id) {
       Saved::where('id_user', Auth::user()->id)->where('id', $id)->delete();
       return response()->json(['success' => 'Unsaved Successfuly']);
    }
}
