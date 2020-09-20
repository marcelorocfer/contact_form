<?php

namespace Tests\Unit;

use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_contact()
    {
        $post = new Contact();

        $post->nome = 'Nome Teste';
        $post->email = 'teste@teste.com';
        $post->telefone = '(77) 7777-7777';
        $post->mensagem = 'Mensagem Teste';
        $post->ip = '192.168.10.10';
        $post->arquivo = 'fcSmNVco6DL5ouL7OZQWPtccxBtsjdNhJ1DjcKN3.pdf';
        $post->save();

        $this->assertDatabaseHas('contacts', [
            'nome' => 'Nome Teste',
            'email' => 'teste@teste.com',
            'telefone' => '(77) 7777-7777',
            'mensagem' => 'Mensagem Teste',
            'ip' => '192.168.10.10',
            'arquivo' => 'fcSmNVco6DL5ouL7OZQWPtccxBtsjdNhJ1DjcKN3.pdf'
        ]);
    }

   /* public function test_mail()
    {
        Mail::fake();

        $data = [
            'reply_name' => 'Nome',
            'reply_email' => 'mrftattoo@gmail.com',
            'subject' => 'Nova Mensagem',
            'message' => 'Mensagem'
        ];

        new ContactMail($data);

        Mail::assertSent(ContactMail::class, function ($data) {
            return $data->subject === 'Nova Mensagem';
        });
    }*/
}
