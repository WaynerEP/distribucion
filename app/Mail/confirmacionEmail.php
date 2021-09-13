<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmacionEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataPedido;
    public $dataProductos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataPedido, $dataProductos)
    {
        $this->dataPedido = $dataPedido;
        $this->dataProductos = $dataProductos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tu pedido ha sido confirmado')->view('Email.sendEmail', ['info' => $this->dataPedido, 'details' => $this->dataProductos]);
    }
}
