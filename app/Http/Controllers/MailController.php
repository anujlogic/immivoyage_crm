<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\AdminMail;
use Mail;

class MailController extends Controller
{
    public function sendAdminMail()
    {
    	$email   = 'mylogicforyou@gmail.com';
    	$data = [
    		'title'=>'Immivoyage Test mail',
    		'url'=>'https://portal.immivoyage.com'
    	];

    	Mail::to($email)->send(new AdminMail($data));
    }
}
