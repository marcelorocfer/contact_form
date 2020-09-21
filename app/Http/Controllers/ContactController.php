<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Contact;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function store(ContactRequest $request)
    {
        $path = $request->file('arquivo')->store('arquivos', 'public');

        $contact = new Contact();
        $contact->nome = $request->input('nome');
        $contact->email = $request->input('email');
        $contact->telefone = $request->input('telefone');
        $contact->mensagem = $request->input('mensagem');
        $contact->ip = $request->ip();
        $contact->arquivo = $path;

        $contact->save();

        $c = Contact::orderBy('id', 'DESC')->first();

        $date = $c->created_at;

        $created_at = date('d/m/Y H:i:s', strtotime($date));

        $data = [
            'reply_name' => $contact->nome,
            'reply_email' => $contact->email,
            'subject' => 'Nova Mensagem',
            'message' => $contact->mensagem,
            'telefone' => $contact->telefone,
            'arquivo' => $contact->arquivo,
            'seu_ip' => $contact->ip,
            'criado_em' => $created_at,
        ];

        Mail::send(new ContactMail($data));

        return redirect('/')->with('message', 'Mensagem enviada com sucesso!');
    }

}
