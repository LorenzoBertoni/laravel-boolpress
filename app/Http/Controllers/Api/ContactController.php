<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request) {
        $data = $request->all();

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to('verapersona@sicuro.it')->send(new NewMail($lead));

        return response()->json([
            'success' => true,
        ]);
    }
}
