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
        return $this->view('mail.cuenta.confirmacion');
    }
}
