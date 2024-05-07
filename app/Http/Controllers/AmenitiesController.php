<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmenitiesController extends Controller
{
    public function GetAll() {
        $amenity = Amenities::latest()->get();

        return view('server.amenity.all_type', [
            "data" => $amenity 
        ]);
    }

    public function Add() {
        return view('server.amenity.add_type');
    }

    public function AddData(Request $req) {

        $req->validate([
            'nama' => 'required|unique:amenities|max:200'
        ]);

        Amenities::insert([
            "nama" => $req->nama
        ]);

        session()->flash('success', 'Added successfully');
        return redirect('/admin/amenity');
    }

    public function Edit($id) {
        $amenity = Amenities::findOrFail($id);

        return view('server.amenity.edit_type',[
            "data" => $amenity
        ]);
    }

    public function EditData(Request $req) {
        $req->validate([
            'nama' => 'required|max:200|unique:amenities,nama,' . $req->id,
        ]);

        Amenities::findOrFail($req->id)->update([
            "nama"=> $req->nama
        ]);

        session()->flash('success', 'Edited successfully');
        return redirect('/admin/amenity');
    }

    public function Hapus($id) {
        Amenities::findOrFail($id)->delete();

        session()->flash('success', 'Deleted successfully');
        return  redirect('/admin/amenity');
    }
}
