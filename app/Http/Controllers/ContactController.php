<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Contact;


use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{

    public function index()
    {
        $posts = Contact::all();
        return view('index', compact($posts));
    }

    public function store(ContactRequest $request)
    {
        $path = $request->file('arquivo')->store('arquivos', 'public');

        $post = new Contact();
        $post->nome = $request->input('nome');
        $post->email = $request->input('email');
        $post->telefone = $request->input('telefone');
        $post->mensagem = $request->input('mensagem');
        $post->ip = $request->ip();
        $post->arquivo = $path;
        $post->save();

        $data = [
            'reply_name' => $post->nome,
            'reply_email' => $post->email,
            'subject' => 'Nova Mensagem',
            'message' => $post->mensagem,
            'telefone' => $post->telefone,
            'arquivo' => $post->arquivo
        ];

        Mail::send(new ContactMail($data));

        return redirect('/')->with('message', 'Mensagem enviada com sucesso!');
    }

}
