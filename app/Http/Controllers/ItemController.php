<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use App\Models\Facilitas;
use App\Models\Item;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\User;
use App\Models\ItemQnA;
use App\Models\Jadwal;
use App\Models\Saved;
use App\Models\Perbandingan;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ItemController extends Controller
{
    public function GetAll() {
        $item = Item::latest()->get();

        return view('server.item.all_type', [
            "data" => $item
        ]);
    }

    public function Add() {
        $propertyTypes = Property::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();

        return view('server.item.add_type', [
            "tipe_property" => $propertyTypes,
            "amenities" => $amenities,
            "agents" => $activeAgent
        ]);
    }

    public function AddData(Request $req) {

        $req->validate([
            'nama_property' => 'required',
            'status_property' => 'required',
            'harga_murah' => 'required',
            'harga_mahal' => 'required',
            'pict_property' => 'required',
            'id_property_type' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'gudang' => 'required',
            'ruang' => 'required',
            'kamar_mandi' => 'required',
            'ukuran_gudang' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required',
            'ukuran_property' => 'required',
            'id_agent' => 'required',
        ]);

        $image = $req->file('pict_property');
        $manager = new ImageManager(new Driver());
        $name_generator = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($req->file('pict_property'));
        $img->resize(370, 250);
        $img->toJpeg(80)->save(base_path('public/images/item/picture/'.$name_generator));

        $save_url = 'images/item/picture/'.$name_generator;

        if ($req->has('id_amenity')) {
            $amenity = $req->id_amenity;
            $amenities = implode(',', $amenity);
        } else {
            $amenities='';
        }


        $kode_property = IdGenerator::generate([
            'table' => 'items',
            'field' => 'kode_property',
            'length' => 5,
            'prefix' => 'I'
        ]);
        

        $id_item = Item::insertGetId([
            "id_property_type"=> $req->id_property_type,
            "id_amenity" => $amenities,
            "nama_property" => $req->nama_property,
            "slug_property" => strtolower(str_replace(' ', '-', $req->nama_property)),
            "kode_property" => $kode_property,
            "status_property" => $req->status_property,
            "harga_murah" => $req->harga_murah,
            "harga_mahal" => $req->harga_mahal,
            "pict_property" => $save_url,
            "info_panjang" => $req->info_panjang,
            "info_pendek" => $req->info_pendek,
            "provinsi" => $req->provinsi,
            "kota" => $req->kota,
            "kecamatan" => $req->kecamatan,
            "kelurahan" => $req->kelurahan,
            "ruang" => $req->ruang,
            "kamar_mandi" => $req->kamar_mandi,
            "gudang" => $req->gudang,
            "ukuran_gudang" => $req->ukuran_gudang,
            "alamat" => $req->alamat,
            "kode_pos" => $req->kodepos,
            "featured" => $req->featured,
            "hot" => $req->hot,
            "ukuran_property" => $req->ukuran_property,
            "video_property" => $req->video_property,
            "id_agent" => $req->id_agent,
            'status' => 1,
            "created_at" => Carbon::now()
        ]);
        
        if ($req->hasFile('multi_images')) {
            foreach($req->file('multi_images') as $img) {
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                $resize_img = $manager->read($img);
                $resize_img->resize(770, 520);
                $resize_img->toJpeg(80)->save(base_path('public/images/item/multi-image/'.$name_gen));
        
                $upload_path = 'images/item/multi-image/'.$name_gen;
                MultiImage::insert([
                    "id_item" => $id_item,
                    "image" => $upload_path,
                    "created_at" => Carbon::now(),
                ]);
            }
        }

        $facilities = Count($req->facility_name);

        if($facilities != NULL) {
            for($i = 0; $i<$facilities; $i++) {
                Facilitas::insert([
                    "id_item" => $id_item,
                    "nama_fasilitas" => $req->facility_name[$i],
                    "distance" => $req->distance[$i],
                    "created_at" => Carbon::now(),
                ]);
            }
        }

        session()->flash('success', 'Item added successfully');

        return redirect('/admin/item');
    }

    public function Edit($id) {
        $item = Item::findOrFail($id);
        $item_amenity = $item->id_amenity;
        $current_amenity = explode(',', $item_amenity);

        $multiImage = MultiImage::where('id_item', $id)->get();

        $propertyTypes = Property::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();
        $fasilitas = Facilitas::where('id_item', $id)->get();

        return view('server.item.edit_type',[
            "data" => $item,
            "tipe_property" => $propertyTypes,
            "amenities" => $amenities,
            "agents" => $activeAgent,
            "current_amenity" => $current_amenity,
            "current_multiImage" => $multiImage,
            "current_fasilitas" => $fasilitas
    ]);
    }

    public function EditData(Request $req) {

        $id_item = $req->id_item;

        $req->validate([
            'nama_property' => 'required',
            'status_property' => 'required',
            'harga_murah' => 'required',
            'harga_mahal' => 'required',
            'id_property_type' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'gudang' => 'required',
            'ruang' => 'required',
            'kamar_mandi' => 'required',
            'ukuran_gudang' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required',
            'ukuran_property' => 'required',
            'id_agent' => 'required',
            "ukuran_property" => 'required',
            "id_agent" => 'required',
        ]);

        

        if ($req->has('id_amenity')) {
            $amenity = $req->id_amenity;
            $amenities = implode(',', $amenity);
        } else {
            $amenities='';
        }

        $old_image = $req->old_pict_property;

        if($req->hasFile('pict_property'))
        {
            if(file_exists($old_image)){
                unlink($old_image);
            }
    
            $image = $req->file('pict_property');
            $manager = new ImageManager(new Driver());
            $name_generator = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($req->file('pict_property'));
            $img->resize(370, 250);
            $img->toJpeg(80)->save(base_path('public/images/item/picture/'.$name_generator));
    
            $save_url = 'images/item/picture/'.$name_generator;
        } else {
            $save_url = $old_image;
        }

        Item::findOrFail($id_item)->update([
            "id_property_type"=> $req->id_property_type,
            "id_amenity" => $amenities,
            "nama_property" => $req->nama_property,
            "slug_property" => strtolower(str_replace(' ', '-', $req->nama_property)),
            "status_property" => $req->status_property,
            "harga_murah" => $req->harga_murah,
            "harga_mahal" => $req->harga_mahal,
            "pict_property" => $save_url,
            "info_panjang" => $req->info_panjang,
            "info_pendek" => $req->info_pendek,
            "provinsi" => $req->provinsi,
            "kota" => $req->kota,
            "kecamatan" => $req->kecamatan,
            "kelurahan" => $req->kelurahan,
            "ruang" => $req->ruang,
            "kamar_mandi" => $req->kamar_mandi,
            "gudang" => $req->gudang,
            "ukuran_gudang" => $req->ukuran_gudang,
            "alamat" => $req->alamat,
            "kode_pos" => $req->kodepos,
            "featured" => $req->featured,
            "hot" => $req->hot,
            "ukuran_property" => $req->ukuran_property,
            "video_property" => $req->video_property,
            "id_agent" => $req->id_agent,
            "updated_at" => Carbon::now()
        ]);

        session()->flash('success', 'Updated item successfully');

        return redirect('/admin/item');
    }

    public function EditInactive(Request $req) {

        $id_item = $req->id_item;


        Item::findOrFail($id_item)->update([      
            'status' => 0,
            "updated_at" => Carbon::now()
        ]);

        session()->flash('success', 'Item has been set inactive!');

        return redirect('/admin/item');
    }

    public function EditActive(Request $req) {

        $id_item = $req->id_item;


        Item::findOrFail($id_item)->update([      
            'status' => 1,
            "updated_at" => Carbon::now()
        ]);

        session()->flash('success', 'Item has been set inactive!');

        return redirect('/admin/item');
    }

    public function EditMultiImage(Request $req) {
        $images = $req->multi_image;

        if($images != null) {

            foreach($images as $id => $img) {
                $imageDelete = MultiImage::findOrFail($id);
                unlink($imageDelete->image);
    
                $manager = new ImageManager(new Driver());
                $name_generator = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                $resize_img = $manager->read($img);
                $resize_img->resize(770, 520);
                $resize_img->toJpeg(80)->save(base_path('public/images/item/multi-image/'.$name_generator));
    
                $upload_path = 'images/item/multi-image/'.$name_generator;
                MultiImage::where('id', $id)->update([
                    "image" => $upload_path,
                    "updated_at" => Carbon::now()
                ]);
            }

            session()->flash('success', 'Updated item successfully');

        } else {
            session()->flash('error', 'No image was chosen');
          }
        return redirect()->back();

        
    }

    public function HapusMultiImage($id) {
        
        $old_image = MultiImage::findOrFail($id);
        unlink($old_image->image);
        MultiImage::findOrFail($id)->delete();

        session()->flash('success', 'Deleted successfully');

        return redirect()->back();
    }

    public function Hapus($id) 
    {
        $item = Item::findOrFail($id);
        unlink($item->pict_property);

        $multi = MultiImage::where("id_item", $id)->get();
        foreach($multi as $image) {
            unlink($image->image);
            MultiImage::where("id_item", $id)->delete();
        }
        

        Facilitas::where("id_item", $id)->delete();
        ItemQnA::where("id_item", $id)->delete();
        Jadwal::where("id_property", $id)->delete();
        Perbandingan::where("id", $id)->delete();
        Saved::where("id_item", $id)->delete();
        Item::where("id", $id)->delete();

        session()->flash('success', 'Deleted successfully');

        return redirect()->back();
    }

    public function TambahMultiImage(Request $req) {
        $id_item = $req->id_item;
        $images = $req->multi_image;

        if($images != null) {
        foreach($req->file('multi_images') as $img) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $resize_img = $manager->read($img);
            $resize_img->resize(770, 520);
            $resize_img->toJpeg(80)->save(base_path('public/images/item/multi-image/'.$name_gen));
    
            $upload_path = 'images/item/multi-image/'.$name_gen;
            MultiImage::insert([
                "id_item" => $id_item,
                "image" => $upload_path,
                "created_at" => Carbon::now(),
            ]);
        }  session()->flash('success', 'Added successfully');

        } else {

          session()->flash('error', 'No image was chosen');
        }


        return redirect()->back();
    }

    public function EditFasilitas(Request $req) {
        $id_item = $req->id_item;
        $facilities = Count($req->facility_name);

        if($facilities != NULL) {
            Facilitas::where('id_item', $id_item)->delete();
            for($i = 0; $i<$facilities; $i++) {
                Facilitas::insert([
                    "id_item" => $id_item,
                    "nama_fasilitas" => $req->facility_name[$i],
                    "distance" => $req->distance[$i],
                    "updated_at" => Carbon::now(),
                ]);
            }
        } else {
            return redirect()->back(); 
        }

        session()->flash('success', 'Updated successfully');

        return redirect()->back();
    }

    public function Rinci($id) {
        $item = Item::findOrFail($id);
        $item_amenity = $item->id_amenity;
        $current_amenity = explode(',', $item_amenity);

        $multiImage = MultiImage::where('id_item', $id)->get();

        $propertyTypes = Property::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();
        $fasilitas = Facilitas::where('id_item', $id)->get();

        return view('server.item.rinci_type',[
            "data" => $item,
            "tipe_property" => $propertyTypes,
            "amenities" => $amenities,
            "agents" => $activeAgent,
            "current_amenity" => $current_amenity,
            "current_multiImage" => $multiImage,
            "current_fasilitas" => $fasilitas
    ]);
    }
}


