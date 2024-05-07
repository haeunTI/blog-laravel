<?php

namespace App\Http\Controllers\server;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Property;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
    public function GetAll() {
        $types=Property::latest()->get();

        return view('server.property.all_type', [
            "data" => $types
        ]);
    }

    public function Add() {

        return view('server.property.add_type');
    }

    public function AddData(Request $req){

        $req->validate([
            'nama_tipe' => 'required|unique:properties|max:200',
            'icon' => 'required'
        ]);

        Property::insert([
            [
                'nama_tipe'=> $req->nama_tipe,
                'icon'=> $req->icon,

            ]
            ]);

        session()->flash('success', 'Berhasil menambah!');
        return redirect('/admin/property');
    }

    public function Edit($id){

        $types = Property::findOrFail($id);

        return view('server.property.edit_type', [
            "data" => $types
        ]);
    }

    public function EditData(Request $req){

        $id = $req->id;

        $req->validate([
            'nama_tipe' => 'required|max:200|unique:properties,nama_tipe,' . $req->id,
            'icon' => 'required'
        ]);

        Property::findOrFail($id)->update([
            "nama_tipe" => $req->nama_tipe,
            "icon" => $req->icon
        ]);

        session()->flash('success', 'Berhasil mengubah!');
        return redirect('/admin/property');
    }

    public function Hapus($id){

        Property::findOrFail($id)->delete();
        Item::where('id_property_type', $id)->delete();


        session()->flash('success', 'Berhasil menghapus data!');
        return redirect()->back();
    }
}
