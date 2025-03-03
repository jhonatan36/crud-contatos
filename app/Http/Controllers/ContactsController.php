<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contacts.index', [
            'contacts' => Contact::get()->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('contacts.create', [
            'title' => 'Cadastrar',
            'subtitle' => 'Cadastro de Contato',
            'description' => 'Cadastre um novo contato para sua lista',
            'action' => 'contact.store',
            'method' => 'post',
            'contact' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required|max:50|string',
                'telefone' => 'required|max:11|string',
                'cep' => 'max:8',
                'logradouro' => 'max:255',
                'numero' => '',
                'complemento' => 'max:100',
                'localidade' => 'max:100',
                'bairro' => 'max:50',
                'estado' => 'max:2',
            ]);

            $userId = $request->user()->id;
            
            $data = array_merge($data, ['user_id'=>$userId]);
            Contact::create($data);

            return redirect()->route('contact.create')->with('success', 'Contato salvo com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('contact.create')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('contacts.edit', [
            'title' => 'Editar',
            'subtitle' => 'Edição de Contato',
            'description' => 'Edite seu contato',
            'action' => 'contact.update',
            'method' => 'post',
            'contact' => Contact::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'nome' => 'required|max:50|string',
                'telefone' => 'required|max:11|string',
                'cep' => 'max:8',
                'logradouro' => 'max:255',
                'numero' => '',
                'complemento' => 'max:100',
                'localidade' => 'max:100',
                'bairro' => 'max:50',
                'estado' => 'max:2',
            ]);

            $userId = $request->user()->id;
            $data = array_merge($data, ['user_id'=>$userId]);
            $contact = Contact::findOrFail($id);
            $contact->fill($data);
            $contact->save();

            return redirect()->route('contact.edit', $id)->with('success', 'Contato atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('contact.edit', $id)->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::destroy($id);

        return redirect()->route('contact.index')->with('success', 'Contato removido!');
    }
}
