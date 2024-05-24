<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function sendEmail(SendEmailRequest $request)
    {
        $validatedData = $request->validated();

        Mail::to($validatedData['to'])->send(new SendEmail($validatedData['message']));

        return response()->json(['message' => 'Email berhasil dikirim'], 200);
    }
}
