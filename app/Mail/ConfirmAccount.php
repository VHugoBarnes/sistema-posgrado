<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Usuario;

class ConfirmAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    public $password;
    public $url = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $datos, string $password)
    //public function __construct()
    {
        $this->datos = $datos;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->url = env('APP_URL');
        
        // echo "<pre> " , var_export($this->datos) , " </pre>";
        // echo "<pre> " , var_export($this->password) , " </pre>";
        // echo "<pre> " , var_export($this->url) , " </pre>";
        // echo "<pre> " , var_export(env('APP_URL')) , " </pre>";
        // die();
        //return $this->view('mail.cuenta.test');
        return $this->subject('Confirmar cuenta')->view('mail.cuenta.confirmacion');
    }
}
