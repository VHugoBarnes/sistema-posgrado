<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmAccount;

class TestController extends Controller
{
    public function sendEmail()
    {
        Mail::to('hugobarnes145@gmail.com')->send(new ConfirmAccount());
        echo "<pre> " , var_export(env('SIS_PASSWORD')) , " </pre>";
        die();
    }
}
