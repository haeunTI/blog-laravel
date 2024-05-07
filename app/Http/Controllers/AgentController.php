<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\ItemQnA;
use App\Models\Jadwal;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Mail\JadwalMail;
use App\Mail\SampleEmail;
use App\Mail\TolakMail;
use App\Models\Item;
use Illuminate\Support\Facades\Log;

class AgentController extends Controller
{
    public function AgentDashboard(){

        return view('agent.index');

    }

    public function AgentLogin(){

        return view('agent.login');

    }

    public function AgentRegister(){

        return view('agent.register');

    }

    public function AgentProfile(){

        $id = Auth::user()->id;
        $agentData = User::findOrFail($id);

        return view('agent.profile', [
            "data" => $agentData
        ]);

    }

    public function AgentPassword(){

        $id = Auth::user()->id;
        $agentData = User::findOrFail($id);

        return view('agent.changepassword', [
            "data" => $agentData
        ]);

    }

    public function AgentPasswordUpdate(Request $req) {
        $id = Auth::user()->id;
        $req->validate([
            "password" => 'required',
            "new_password" => 'required|confirmed',
        ]);


        if(!Hash::check($req->password, auth::user()->password)){
            session()->flash('error', 'Old password does not match!');
            return redirect()->back();
        }

        User::whereId(auth::user()->id)->update([
            "password" => Hash::make($req->new_password)
        ]);

        session()->flash('success', 'Password has been updated successfully');

        return redirect()->back();
    }

    public function AgentProfileUpdate(Request $req) {
        $id = Auth::user()->id;
        $agentData = User::findOrFail($id);


        $req->validate([
            "name" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "address" => 'required',
            "company" => 'required',
        ]);
        
        $agentData->email = $req->email;
        $agentData->phone = $req->phone;
        $agentData->address = $req->address;
        $agentData->name = $req->name;
        $agentData->company = $req->company;



        if($req->file('photo')) {
            $file = $req->file('photo');
            @unlink(public_path('images/agent_images'.$agentData->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/agent_images'),$filename);
            $agentData['image'] = $filename;
        }

        $agentData->save();

        session()->flash('success', 'Profile has been updated successfully');

        return redirect()->back();
    }

    
    public function AgentLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('success', 'Agent logged out successfully');

        return redirect('/agent/login');
    }

    public function RegisterData(Request $req) {
        
            // Validate the request
        $req->validate([
            'company' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $user = User::create([
            'name' => $req->name,
            'company' => $req->company,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone' => $req->phone,
            'role' => 'agent',
            'status' => 'inactive'
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        return redirect(RouteServiceProvider::AGENT);
    }

    public function getAll() {
        $agents = User::where("role", "agent")->get();
        return view("server.agent.all_type", [
            "data" => $agents
        ]);
    }


    public function Tambah() {

        return view("server.agent.add_type");
    }

    public function TambahData(Request $req) {


        $req->validate([
            "nama" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "password" => 'required',
            "company" => 'required',
        ]);

        User::insert([
            "name" => $req->nama,
            "email" => $req->email,
            "phone" => $req->phone,
            "company" => $req->company  ,
            "password" => Hash::make($req->password),
            "address" => $req->address,
            "role" => 'agent',
            "status" => 'active',
        ]);

        session()->flash('success', 'Successfully added new agen!');

        return redirect('/admin/agent');
    }

    public function Edit($id) {
        $agent = User::findOrFail($id);

        return view("server.agent.edit_type", [
            "data" => $agent
        ]);
    }

    public function EditData(Request $req) {
        
        $id = $req->id_agent;
        $req->validate([
            "nama" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "company" => 'required',
        ]);

        User::whereId($id)->update([
            "name" => $req->nama,
            "email" => $req->email,
            "phone" => $req->phone,
            "address" => $req->address,
            'company' => $req->company,
        ]);

        session()->flash('success', 'Agen data updated successfully!');

        return redirect('/admin/agent');
    }

    public function Hapus($id) {
        User::findOrFail($id)->delete();
        Item::where("id_agent", $id)->delete();

        session()->flash('success', 'Successfully deleted new agen!');

        return redirect()->back();
    }

    public function InactivateAgent($id) {
        User::whereId($id)->update([
            "status" => 'inactive',
            "updated_at" => Carbon::now()
        ]);

        session()->flash('success', 'Agent is now inactive!');
        return redirect()->back();

    }

    public function ActivateAgent($id) {
        User::whereId($id)->update([
            "status" => 'active',
            "updated_at" => Carbon::now()
        ]);

        session()->flash('success', 'Agent is now active!');

        return redirect()->back();
    }

    public function AgentGetQnA() {
        $id = Auth::user()->id;

        $qna = ItemQnA::with('user')->where("id_agent", $id)->where('isReply', 0)->latest()->get();
        $for = "inbox";
        return view("agent.qna.all",[
            "for" => $for,
            "data" => $qna
        ]);
    }

    public function AgentGetAllQnA() {
        $id = Auth::user()->id;

        $qna = ItemQnA::with('user')->where("id_agent", $id)->latest()->get();
        $for = "all";
        return view("agent.qna.all",[
            "for" => $for,
            "data" => $qna
        ]);
    }

    public function AgentGetSingleQnA($id) {
        $qna = ItemQnA::with('item')->whereId($id)->get()->first();

        return view("agent.qna.baca",[
            "data" => $qna
        ]);
    }

    public function RequestJadwal() {
        $jadwal = Jadwal::where("id_agent",Auth::user()->id)->get();

        return view("agent.jadwal.tour",[
            "data" => $jadwal
        ]);
    }


    public function HapusJadwal($id) {
        Jadwal::findOrFail($id)->delete();

        session()->flash('success', 'Successfully deleted jadwal!');

        return redirect()->back();
    }

    public function ViewJadwal($id) {
        $jadwal = Jadwal::where('id', $id)->first();

        // dd($jadwal);

        return view("agent.jadwal.detail",[
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

        return redirect("agent/schedule/request");
    }

    public function AgentReply(Request $req) {

        $req->validate([
            'message' => 'required',
            'subject' => 'required'
        ]);

        $message = $req -> message;
        $subject = $req -> subject;

        $id = Auth::user()->id;
        $profileData = User::find($id);

        $respond = [
            "message" => $message,
            "subject" => $subject,
            "sender" => $profileData->name
        ];

        $id = $req-> id;
        $email = $req->email;




        Mail::to($email)->send(new JadwalMail($respond));
        ItemQnA::whereId($id)->update([
            "isReply" => 1
        ]);

        session()->flash('success', 'Sent email successfully');

        return redirect("agent/qna");

       
    }

}
