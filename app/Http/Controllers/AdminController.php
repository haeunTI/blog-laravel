<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Mail\JadwalMail;
use App\Mail\TolakMail;
use App\Models\ContactUs;
use App\Models\ItemQnA;
use App\Models\Jadwal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogin(){
        return view('admin.login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id); 

        return view('admin.profile', [
            "data" => $profileData
        ]);
    }

    public function AdminProfileUpdate(Request $req){
        $id = Auth::user()->id;
        $profileData = User::find($id); 

        $profileData->email = $req -> email;
        $profileData->address = $req -> address;
        $profileData->phone = $req -> phone;

        if($req->file('photo')) {
            $file = $req->file('photo');
            @unlink(public_path('images/admin_images'.$profileData->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/admin_images'),$filename);
            $profileData['image'] = $filename;
        }

        $profileData->save();

        session()->flash('success', 'Admin profile has been updated successfully');
        return redirect()->back();
    }

    public function AdminProfilePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id); 

        return view('admin.changepassword', [
            "data" => $profileData
        ]);
    }

    public function AdminUpdatePassword(Request $req){
        $id = Auth::user()->id;
        $profileData = User::find($id); 

        //validation
        $req->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        //match the old password
        if(!Hash::check($req->password, auth::user()->password)){
            session()->flash('error', 'Old password does not match!');
            return redirect()->back();
        }
        
        User::whereId(auth::user()->id)->update([
            "password" => Hash::make($req->new_password)
        ]);
    
        session()->flash('success', 'Password changed successfully!');
        return redirect()->back();


    }
        
        

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function AdminGetQnA() {
        $data = ItemQnA::with('user')->where('isReply', 0)->latest()->get();
        $for = "inbox";

        return view('server.qna.all', [
            "for" => $for,
            "data" => $data
        ]);
    }

    public function AdminGetAllQnA() {
        $data = ItemQnA::with('user')->latest()->get();
        $for = "all";
        
        return view('server.qna.all', [
            "for" => $for,
            "data" => $data
        ]);
    }


    public function AdminGetContactUs() {
        $data = ContactUs::latest()->get();
        $for = "contactus";
        
        return view('server.qna.all', [
            "for" => $for,
            "data" => $data
        ]);
    }

    public function AdminGetSingleQnA($id) {
        $data = ItemQnA::whereId($id)->get()->first();
        $all = ItemQnA::with('user')->latest()->get();
        $inbox = ItemQnA::with('user')->where('isReply', 0)->latest()->get();

        return view('server.qna.baca', [
            "data" => $data,
            "inbox" => $inbox,
            "all" => $all,

        ]);
    }

    
    public function AdminGetSingleContact($id) {
        $data = ContactUs::whereId($id)->get()->first();
        $all = ItemQnA::with('user')->latest()->get();
        $inbox = ItemQnA::with('user')->where('isReply', 0)->latest()->get();

        return view('server.qna.contactus', [
            "data" => $data,
            "inbox" => $inbox,
            "all" => $all,

        ]);
    }


    public function AdminReply(Request $req) {

        $req->validate([
            'message' => 'required',
            'subject' => 'required'
        ]);

        $message = $req -> message;
        $subject = $req -> subject;

        $respond = [
            "message" => $message,
            "subject" => $subject,
            "sender" => "Admin"
        ];

        $id = $req-> id;
        $email = $req->email;

        Mail::to($email)->send(new JadwalMail($respond));

        $from = $req->from;

        if($from == "qna") {
            ItemQnA::whereId($id)->update([
                "isReply" => 1
            ]); 
        } else {
            ContactUs::whereId($id)->update([
                "isReply" => 1
            ]);
        }

        session()->flash('success', 'Sent email successfully');
    

        return redirect("/admin/qna");
    }

    public function RequestJadwal() {
        $jadwal = Jadwal::where("id_agent",Auth::user()->id)->get();

        return view("admin.jadwal.tour",[
            "data" => $jadwal
        ]);
    }


    public function HapusJadwal($id) {
        Jadwal::findOrFail($id)->delete();

        session()->flash('success', 'Successfully deleted jadwal!');

        return redirect()->back();
    }

    public function RequestSemuaJadwal() {
        $jadwal = Jadwal::orderBy('created_at', 'asc')->get();
        
        return view("server.jadwal.tour",[
            "data" => $jadwal
        ]);

    }

    public function ViewJadwal($id) {
        $jadwal = Jadwal::where('id', $id)->first();

        // dd($jadwal);

        return view("server.jadwal.detail",[
            "data" => $jadwal
        ]);
    }

    public function ConfirmJadwal(Request $req) {

        $action = $req->input('action');

        if ($action === 'tolak') {
            Jadwal::whereId($req->id)->update([
                "updated_at" => Carbon::now(),
                "status" => "2"
            ]);
    
            $jadwal = Jadwal::findOrFail($req->id)->first();
    
            $email = $jadwal->User->email;
    
            Mail::to($email)->send(new TolakMail($jadwal));
        } elseif ($action === 'setuju') {
            Jadwal::whereId($req->id)->update([
                "updated_at" => Carbon::now(),
                "status" => "1"
            ]);
    
            $jadwal = Jadwal::findOrFail($req->id)->first();
    
            $email = $jadwal->User->email;
    
            Mail::to($email)->send(new HelloMail($jadwal));
        }

        return redirect("admin/jadwal");
    }

    

}
