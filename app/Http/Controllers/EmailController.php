<?php

namespace App\Http\Controllers;

use App\Mail\ProfileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){

        Mail::to('yajivaf283@buides.com')->send(new ProfileMail());
        return "Email has been sent..";
    }
}
