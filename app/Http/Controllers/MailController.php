<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\KarmaReservationMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(MailRequest $request)
    {
        $request->validated(); // Vérification des données du formulaire

        Mail::to("karma.reservation@outlook.com")->send(new KarmaReservationMail($request));
        
        return redirect()->route('show.contact')->with('success','Nous avons bien reçu votre message. Nous vous répondrons au plus vite!');
        
    }
}
