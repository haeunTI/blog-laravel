<?php

namespace App\Http\Controllers;

use App\Models\ItemQnA;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QnAController extends Controller
{
    public function sendMessage(Request $req) {
        
        if(Auth::check()) {
            ItemQnA::insert([
                "id_agent" => $req->id_agent,
                "id_user" => $req->id_user,
                "id_item" => $req->id_item,
                "nama" => $req->name,
                "email" => $req->email,
                "phone" => $req->phone,
                "question" => $req->message,
                "isReply" =>0,
                "created_at" => Carbon::now()
            ]);
    
            session()->flash('success', "Anda berhasil mengirim QnA pada agent!");
            return redirect()->back();
        
        } else {
            session()->flash('error', "Silakan login terlebih dahulu!");
            return redirect()->back();
        }

        
    }
}
