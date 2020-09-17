<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;


use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    public function index()
    {
        $posts = Contact::all();
        return view('index', compact(['posts']));
    }

    public function store(Request $request)
    {
        $path = $request->file('arquivo')->store('imagens', 'public');

        $post = new Contact();
        $post->nome = $request->input('nome');
        $post->email = $request->input('email');
        $post->fone = $request->input('fone');
        $post->mensagem = $request->input('mensagem');
        $post->arquivo = $path;
        $post->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $post = Contact::find($id);
        if (isset($post)) {
            Storage::disk('public')->delete($post->arquivo);
            $post->delete();
        }
        return redirect('/');
    }

    public function download($id)
    {
        $post = Contact::find($id);
        if (isset($post)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($post->arquivo);
            return response()->download($path);
        }
        return redirect('/');
    }


}
