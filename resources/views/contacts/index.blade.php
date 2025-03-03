<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contatos') }}
        </h2>
        <div class="mt-4">
            <a href="{{ route("contact.create") }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Novo Contato</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            
            <section>
                @if(empty($contacts))
                    <h6 class="text-white">Nenhum contato cadastrado!</h6>
                @else
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Tabela de Contatos') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Lista de contatos cadastrados.") }}
                        </p>
                    </header>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Telefone</th>
                                    <th class="px-4 py-2">CEP</th>
                                    <th class="px-4 py-2">Rua</th>
                                    <th class="px-4 py-2">Número</th>
                                    <th class="px-4 py-2">Complemento</th>
                                    <th class="px-4 py-2">Bairro</th>
                                    <th class="px-4 py-2">Localidade</th>
                                    <th class="px-4 py-2">Estado</th>
                                    <th class="px-4 py-2">Criado</th>
                                    <th class="px-4 py-2">Editado</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact )
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-center">{{$contact->id}}</td>
                                    <td class="px-4 py-2">{{$contact->nome}}</td>
                                    <td class="px-4 py-2">{{$contact->telefone}}</td>
                                    <td class="px-4 py-2">{{$contact->cep}}</td>
                                    <td class="px-4 py-2">{{$contact->logradouro}}</td>
                                    <td class="px-4 py-2">{{$contact->numero}}</td>
                                    <td class="px-4 py-2">{{$contact->complemento}}</td>
                                    <td class="px-4 py-2">{{$contact->bairro}}</td>
                                    <td class="px-4 py-2">{{$contact->localidade}}</td>
                                    <td class="px-4 py-2">{{$contact->estado}}</td>
                                    <td class="px-4 py-2 text-green-600 font-semibold">{{$contact->created_at}}</td>
                                    <td class="px-4 py-2 text-green-600 font-semibold">{{$contact->updated_at}}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('contact.edit', ['id'=>$contact->id]) }}" class="bg-gray-500 text-white px-3 py-1 rounded">Editar</a>
                                            <a href="{{ route('contact.destroy', ['id'=>$contact->id]) }}" onclick="return confirm('Confirma a exclusão do registro?')" class="bg-red-500 text-white px-3 py-1 rounded">Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>    
        </div>
    </div>
</x-app-layout>