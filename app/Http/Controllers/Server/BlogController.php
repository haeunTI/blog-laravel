<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\blogPost;
use App\Models\Komentar;
use App\Models\TipeBlog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Colors\Rgb\Channels\Red;

error_reporting(E_ERROR | E_PARSE);

class BlogController extends Controller
{
    public function GetAll() {
        $data = TipeBlog::latest()->get();

        return view("server.blog.all_type", [
            "data" => $data
        ]);
    }

    public function GetAllPost() {
        $data = blogPost::latest()->get();

        return view("server.blog.all_blog", [
            "data" => $data
        ]);
    }

    public function AddData(Request $req) {

        $req->validate([
            "nama" => "required|unique:tipe_blogs"
        ]);

        TipeBlog::insert([
            "nama" => $req->nama,
            "slug" => strtolower(str_replace(' ', '-', $req->nama))
        ]);


        session()->flash('success', 'Successfully added');
        return redirect('/admin/tipe_blog');
    }

    public function AddPost() {
        $blogcat = TipeBlog::latest()->get();
        return view('server.blog.add_post',[
            "blog_cat" => $blogcat
        ]);
    }

    public function Hapus(Request $req) {
        TipeBlog::findOrFail($req->id)->delete();

        session()->flash('success', 'Successfully deleted');
        
        return redirect()->back();
    }

    public function Edit($id) {
        $data = TipeBlog::findOrFail($id);

        return response()->json($data);
    }

    public function EditData(Request $req) {
        $req->validate([
            'nama' => 'required|unique:tipe_blogs,nama,' . $req->id,
        ]);

        TipeBlog::findOrFail($req->id)->update([
            "nama"=> $req->nama,
            "slug" => strtolower(str_replace(' ', '-', $req->nama))
        ]);

        session()->flash('success', 'Successfully edited');


        return redirect()->back();
    }

    public function PublishPost(Request $req) {

        $req->validate([
            "judul" => 'required|unique:blog_posts',
            "info_panjang" => 'required', 
            "info_pendek" => 'required', 
        ]);

        $image = $req->file('image');

        if ($image) {
            $manager = new ImageManager(new Driver());
            $name_generator = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(370, 250);
            $img->toJpeg(80)->save(base_path('public/images/upload/'.$name_generator));
        
            $save_url = 'images/upload/'.$name_generator;
        } else {
            $save_url = '';
        }
        


        blogPost::insert([
            "blog_cat_id"=> $req->kategori,
            "id_user" => Auth::user()->id,
            "judul" => $req->judul,
            "slug" => strtolower(str_replace(' ', '-', $req->judul)),
            "image" => $save_url,
            "info_panjang" => $req->info_panjang,
            "info_pendek" => $req->info_pendek,
            "created_at" => Carbon::now()
        ]);

        session()->flash('success', 'Successfully added post');

        return redirect('/post/all/type');
    }

    public function HapusPost($id) {
        blogPost::findOrFail($id)->delete();

        session()->flash('success', 'Successfully deleted');
        
        return redirect()->back();
    }

    public function EditPost($id) {
        $data = blogPost::findOrFail($id);   
        $blogcat = TipeBlog::latest()->get();

        return view('server.blog.edit_type', [
            "data" => $data,
            "blog_cat" => $blogcat
        ]);
    }

    public function EditPublishPost(Request $req) {

        
        $req->validate([
            "judul" => 'required|unique:blog_posts,judul,' . $req->id,
            "info_panjang" => 'required', 
            "info_pendek" => 'required', 
        ]);

        $image = $req->file('image');

        if ($image) {
            $manager = new ImageManager(new Driver());
            $name_generator = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(370, 250);
            $img->toJpeg(80)->save(base_path('public/images/upload/'.$name_generator));
        
            $save_url = 'images/upload/'.$name_generator;
            blogPost::findOrFail($req->id)->update([
                "judul"=> $req->judul,
                "slug" => strtolower(str_replace(' ', '-', $req->judul)),
                "image" => $save_url,
                "info_panjang" => $req->info_panjang,
                "info_pendek" => $req->info_pendek,
                "created_at" => Carbon::now()
            ]);
        } else {
            blogPost::findOrFail($req->id)->update([
                "judul"=> $req->judul,
                "slug" => strtolower(str_replace(' ', '-', $req->judul)),
                "info_panjang" => $req->info_panjang,
                "info_pendek" => $req->info_pendek,
                "created_at" => Carbon::now()
            ]);
        }


        session()->flash('success', 'Successfully edited');
        return redirect('/post/all/type');

    }

    public function TambahKomentar(Request $req) {
        $req->validate([
            "subject" => 'required',
            "message" => 'required'
        ]);

        Komentar::insert([
            "id_user" => Auth::user()->id,
            "id_post" => $req->id_post,
            "subject" => $req->subject,
            "message" => $req->message,
            "created_at" => Carbon::now(),
            "status" => "pending"
        ]);

        return redirect()->back();
    }

    public function GetAllComment (Request $req) {
        $data = Komentar::where("id_parent", null)->where("status", 'pending')->latest()->get();

        return view("server.blog.unreplied_comment", [
            "data" => $data
        ]);
    }

    public function Balas ($id) {
        $data = Komentar::whereId($id)->get()->first();

        // dd($data);

        return view("server.blog.balas_comment", [
            "data" => $data
        ]);
    }


    public function PublishBalas(Request $req) {
        $id = $req->id;
        $id_user = $req->id_user;

        Komentar::findOrFail($id)->update([
            "status" => "selesai"
        ]);

        Komentar::insert([
            "id_user" => $id_user,
            "id_post" => $req->id_post,
            "id_parent" => $id,
            "subject" => $req->subject,
            "message" => $req->message,
            "created_at" => Carbon::now()
        ]);

        session()->flash('success', 'Successfully replied');

        return redirect('/admin/comment');
    }
}
