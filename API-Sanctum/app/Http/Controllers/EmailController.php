<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'nama' => 'required|max:255',
            'pesan' => 'required|max:255',
        ]);

        // Data email
        $details = [
            'email' => $request->input('email'),
            'nama' => $request->input('nama'),
            'pesan' => $request->input('pesan'),
        ];
        
        // Mengirim email
        Mail::to($details['email'])->send(new SendEmail($details));

        // Respon
        return response()->json([
            'message' => 'Email sent successfully',
            'data' => $details
        ]);
    }
}
