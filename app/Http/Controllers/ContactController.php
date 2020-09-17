<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Contact;


use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    function validPhone($phone){
        return preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/', $phone);
    }

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
