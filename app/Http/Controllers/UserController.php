<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index() {
        return view('user.index');
    }

    public function UserDashboard() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $accept = Jadwal::where("id_user", $id)->where("status", 1)->get();
        $pending = Jadwal::where("id_user", $id)->where("status", 0)->get();
        $reject = Jadwal::where("id_user", $id)->where("status", 2)->get();

        return view('dashboard', [
            "data" => $profileData,
            "accept" => count($accept),
            "pending" => count($pending),
            "reject" => count($reject),

        ]);
    }

    public function UserProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id); 
        return view('user.dasbor.edit_profile', [
            "data" => $profileData
        ]);
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->flash('success', 'You have been logged out!');

        return redirect('/');
    }

    public function UserProfilePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id); 

        return view('user.dasbor.changepassword', [
            "data" => $profileData
        ]);
    }

    public function UserUpdatePassword(Request $req){
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
        

        //update the new pass
        $profileData->save();
        session()->flash('success', 'Password changed successfully!');
        return redirect()->back();


    }

    public function UserReqJadwal()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $req = Jadwal::with('Item')->where("id_user", $id)->get();
        return view('user.jadwal.request', [
            "data" => $userData,
            "req" => $req
        ]);
    }


    public function UserProfileUpdate(Request $req){
        $id = Auth::user()->id;
        $profileData = User::find($id); 

        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $profileData->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $profileData->id,
            'image' => 'nullable|image|max:2048', 
        ]);

        $profileData->name = $req -> name;
        $profileData->email = $req -> email;
        $profileData->address = $req -> address;
        $profileData->phone = $req -> phone;

        if($req->file('image')) {
            $file = $req->file('image');
            @unlink(public_path('images/user_images'.$profileData->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/user_images'),$filename);
            $profileData['image'] = $filename;
        }

        $profileData->save();

        session()->flash('success', 'User profile has been updated successfully');
        return redirect()->back();
    }


    
}
