<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    //
    public function sendTestEmail()
    {
        
        \Mail::to('arimoto@n-di.co.jp')->send(new \App\Mail\Greet());
        
        echo "Mail Send!!";
    }
}
