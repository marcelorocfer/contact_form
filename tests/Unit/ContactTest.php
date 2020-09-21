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

    public function test_send_mail()
    {
        Mail::fake();
        Mail::to('marceloengecomp@gmail.com')->send(new ContactMail(['email' => 'marceloengecomp@gmail.com']));
        Mail::assertSent(ContactMail::class);
    }
}
