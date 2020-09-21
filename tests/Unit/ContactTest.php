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

    public function test_mail()
    {
        /*Mail::fake();

        Mail::assertNothingSent();

        Mail::assertSent(ContactMail::class, 0);*/

//        Mail::assertSent(ContactMail::class);

        /*$data = [
            'nome' => 'Nome',
            'email' => 'mrftattoo@gmail.com',
            'subject' => 'Nova Mensagem',
            'message' => 'Mensagem',
            'telefone' => '(77) 7777-7777',
            'arquivo' => 'teste.pdf'
        ];

        Mail::assertSent(new ContactMail($data));*/

        /*Mail::assertSent(ContactMail::class, function ($mail) use ($data) {
            $this->assertFalse($mail->hasTo($data->nome), 'Unexpected to');

            return false;
        });*/

//        new ContactMail($data);

        /*Mail::assertSent(function (ContactMail $mail) {
            $mail->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });*/


        /*$mail = Mail::to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->send(new ContactMail($data));
        Mail::assertSent(ContactMail::class, function($mail) {
            $build = $mail->build();
        });*/

    }
}
