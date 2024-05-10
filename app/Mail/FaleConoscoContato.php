<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Contato;

class FaleConoscoContato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Contato $contato)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Obrigado por nos enviar sua dúvida para a Siscon Contabilidade',
            tags: ['faleconosco'],
            metadata: [
                'contato_id' => $this->contato->id,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.faleconoscocontato',
            with: [
                'contatoName' => $this->contato->nome,
                'email' => $this->contato->email, 
                'assunto' => $this->contato->assunto, 
                'telefone_fixo' => $this->contato->telefone_fixo, 
                'telefone_celular' => $this->contato->telefone_celular, 
                'empresa_nome' => $this->contato->empresa_nome, 
                'empresa_contato' => $this->contato->empresa_contato, 
                'comentario' => $this->contato->comentario, 
                'ativo' => $this->contato->ativo, 
                'newslatter' => $this->contato->newslatter
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
