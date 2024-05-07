<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\blogPost;
use App\Models\ContactUs;
use App\Models\Facilitas;
use App\Models\Item;
use App\Models\ItemQnA;
use App\Models\Jadwal;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\TipeBlog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function ItemDetail($id) {
        $item = Item::findOrFail($id);

        $agent = User::whereId($item->id_agent)->first();
        $property_type = Property::whereId($item->id_property_type)->first();
        $multiImage = MultiImage::where('id_item', $id)->get();
        $item_amenity = $item->id_amenity;
        $current_amenity = explode(',', $item_amenity);
        $fasilitas = Facilitas::where('id_item', $id)->get();

        $amenity_names = []; 

        if (!empty($current_amenity)) {
            foreach($current_amenity as $amenity_id) {
                $amenity = Amenities::find($amenity_id);
                if ($amenity) {
                    $amenity_name = $amenity->nama;
                    $amenity_names[] = $amenity_name;
                }
            }
        }

        // dd($id);
        
        $id_property_type = $item->id_property_type;
        $item_terhubung = Item::where("id_property_type", $id_property_type)->where('id','!=', $id)->limit(3)->get();

        return view("user.item.detail", [
            "data" => $item,
            "agent" => $agent,
            "property_type" => $property_type,
            "amenities" => $amenity_names,
            "fasilitas" => $fasilitas,
            "multi_images" => $multiImage,
            "rekomendasi" => $item_terhubung
        ]);

        // return redirect()->back();
    }

    public function TentangAgen($id) {
        $data = User::findOrFail($id);

        $items = Item::where("id_agent", $id)->get();
        $fItems = Item::where("featured", 1)->limit(5)->get();
        $sewa_Items =Item::where("status", 1)->where("status_property", "sewa")->get();
        $jual_Items = Item::where("status", 1)->where("status_property", "jual")->get();

        return view("user.agent.tentang", [
            "data" => $data,
            "items" => $items,
            "featured" => $fItems,
            "sewa" => $sewa_Items,
            "jual" => $jual_Items
        ]);
    }

    public function itemSewa() {
        // $data=User::findOrFail($id);

        $items = Item::where("status", 1)->where("status_property", "sewa")->paginate(2);
        $sewa_Items =Item::where("status", 1)->where("status_property", "sewa")->get();
        $jual_Items = Item::where("status", 1)->where("status_property", "jual")->get();


        // dd($items);

        return view("user.item.sewa", [
            "data" => $items,
            "sewa" => $sewa_Items,
            "jual" => $jual_Items
        ]);
    }

    public function itemJual() {
        $items = Item::where("status", 1)->where("status_property", "jual")->paginate(2);
        $sewa_Items =Item::where("status", 1)->where("status_property", "sewa")->get();
        $jual_Items = Item::where("status", 1)->where("status_property", "jual")->get();

        return view("user.item.jual", [
            "data" => $items,
            "sewa" => $sewa_Items,
            "jual" => $jual_Items
        ]);
    }

    public function tipeItem($id) {
        $items = Item::with('type')->where("id_property_type", $id)->paginate(5);
        $tipe = Property::whereId($id)->first();

        // dd($items);
        return view("user.item.tipe", [
            "data" => $items,
            "judul" => $tipe
        ]);
    }

    public function sendMessage(Request $req) {
        
        if(Auth::check()) {
            ItemQnA::insert([
                "id_agent" => $req->id_agent,
                "id_user" => Auth::user()->id,
                "nama" => $req->name,
                "email" => $req->email,
                "phone" => $req->phone,
                "question" => $req->message,
                "isReply" => 0,
                "created_at" => Carbon::now()
            ]);
    
            session()->flash('success', "Anda berhasil mengirim QnA pada agent!");
            return redirect()->back();
        
        } else {
            session()->flash('error', "Silakan login terlebih dahulu!");
            return redirect()->back();
        }

        
    }

    public function daftarTipe() {
        $items = Property::latest()->get();

        // dd($items);
        return view("user.item.daftar_tipe", [
            "data" => $items,
        ]);
    }

    public function cariJual(Request $req) {
        $req -> validate([
            "search" => 'required'
        ]);

        $nama = $req->search;
        $provinsi = $req->provinsi;
        $type = $req->property_type;

        $query = Item::where('status_property', "jual")
        ->where('nama_property', 'like', '%' . $nama . '%')
        ->where('provinsi', $provinsi);
        
        if($type != 'All') {
            $query->where('id_property_type', $type);
        }

        $items = $query->paginate(5);


        $sewa_Items =Item::where("status", 1)->where("status_property", "sewa")->get();
        $jual_Items = Item::where("status", 1)->where("status_property", "jual")->get();
        // dd($items);

        return view("user.item.hasil_pencarian", [
            "data" => $items,
            "sewa" => $sewa_Items,
            "jual" => $jual_Items
        ]);

        // return redirect()->back();
    }

    public function cariSewa(Request $req) {
        $req -> validate([
            "search" => 'required'
        ]);

        $nama = $req->search;
        $provinsi = $req->provinsi;
        $type = $req->property_type;

        $query = Item::where('status_property', "sewa")
        ->where('nama_property', 'like', '%' . $nama . '%')
        ->where('provinsi', $provinsi);
        
        if($type != 'All') {
            $query->where('id_property_type', $type);
        }

        $items = $query->paginate(5);


        $sewa_Items =Item::where("status", 1)->where("status_property", "sewa")->get();
        $jual_Items = Item::where("status", 1)->where("status_property", "jual")->get();
        // dd($items);

        return view("user.item.hasil_pencarian", [
            "data" => $items,
            "sewa" => $sewa_Items,
            "jual" => $jual_Items
        ]);

        // return redirect()->back();
    }

    public function cariSemua(Request $req) {
        
        $status = $req->status_property;
        $provinsi = $req->provinsi;
        $type = $req->property_type;
        $kamar_mandi = $req->kamar_mandi;
        $ruang = $req->ruang;

        $items = Item::where('status', 1)->
        where('provinsi', $provinsi)->
        where('kamar_mandi', $kamar_mandi)->
        where('ruang', $ruang)->
        where('status_property', $status)
        ->where('id_property_type', $type)->paginate(5);
        
        $sewa_Items =Item::where("status", 1)->where("status_property", "sewa")->get();
        $jual_Items = Item::where("status", 1)->where("status_property", "jual")->get();

        return view("user.item.hasil_pencarian", [
            "data" => $items,
            "sewa" => $sewa_Items,
            "jual" => $jual_Items
        ]);

    }

    public function blogDetail($slug) {
        $data = blogPost::where('slug', $slug)->first();
        $category = TipeBlog::latest()->get();
        $recent = blogPost::latest()->limit(3)->get();

        return view("user.blog.detail", [
            "data" => $data,
            "category" => $category,
            "recent_post" => $recent
        ]);
    }

    public function blogCategory($id) {
        $category_id = $id;
        $judul = TipeBlog::whereId($category_id)->first();
        $data = blogPost::where('blog_cat_id', $category_id)->paginate(5);
        $category = TipeBlog::latest()->get();
        $recent = blogPost::latest()->limit(3)->get();


        return view("user.blog.daftar", [
            "judul"=> $judul,
            "data"=> $data,
            "category" => $category,
            "recent_post" => $recent
        ]);
    }

    public function AllBlog() {
        $data = blogPost::latest()->paginate(5);
        $category = TipeBlog::latest()->get();
        $recent = blogPost::latest()->limit(3)->get();


        return view("user.blog.all", [
            "data"=> $data,
            "category" => $category,
            "recent_post" => $recent
        ]);
    }

    public function schedule(Request $req) {

        $req->validate([
            "tanggal_tour" => 'required',
            "waktu_tour" => 'required', 
            "message" => 'required', 
        ]);

        Jadwal::insert([
            "id_user" => $req->id_user,
            "id_agent" => $req->id_agent,
            "id_property" => $req->id_property,
            "tanggal_tour" => $req->tanggal_tour,
            "waktu_tour" => $req->waktu_tour,
            "message" => $req->message,
            "created_at" => Carbon::now()
        ]);

        session()->flash('success', "Anda berhasil membooking jadwal, silakan check email untuk konfirmasi dari admin!");
        return redirect()->back();
    }

    public function about()
    {
        return view("user.about_contact.about");
    }

    
    public function contact()
    {
        return view("user.about_contact.contact");
    }

    public function sendContact(Request $req) {

        $req->validate([
            "username" => 'required',
            "email" => 'required', 
            "subject" => 'required', 
            "message" => 'required', 
        ]);

        ContactUs::insert([
            "nama" => $req->username,
            "email" => $req->email,
            "subject" => $req->subject,
            "question" => $req->message,
            "isReply" => 0,
            "created_at" => Carbon::now()
        ]);

        session()->flash('success', "Anda berhasil ---");
        return redirect()->back();
    }


    public function DaftarAgen()
    {
        $data = User::where('role', 'agent')->where('status', 'active')->paginate(5);
        $fItems = Item::where("featured", 1)->limit(5)->get();

        // dd($data);   

        return view("user.agent.list", [
            "data" => $data,
            "featured" => $fItems,
        ]);
    }

    public function CariAgen(Request $req)
    {
        $data = User::where('role', 'agent')->where('status', 'active')->where('name', $req->name)->paginate(5);

        return view("user.agent.hasil_pencarian", [
            "data" => $data
        ]);

    }
}
