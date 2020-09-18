<?php

namespace Tests;

use App\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
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
            'email' => 'teste@teste.com',
            'nome' => 'Nome Teste',
            'telefone' => '(77) 7777-7777',
            'mensagem' => 'Mensagem Teste',
            'ip' => '192.168.10.10',
            'arquivo' => 'fcSmNVco6DL5ouL7OZQWPtccxBtsjdNhJ1DjcKN3.pdf'
        ]);
    }
}
