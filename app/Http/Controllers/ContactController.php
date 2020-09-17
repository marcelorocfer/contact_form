<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Contact;


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
        $path = $request->file('arquivo')->store('imagens', 'public');

        $post = new Contact();
        $post->nome = $request->input('nome');
        $post->email = $request->input('email');
        $post->telefone = $request->input('telefone');
        $post->mensagem = $request->input('mensagem');
        $post->ip = $request->ip();
        $post->arquivo = $path;
        $post->save();

        return redirect('/');
    }

}
