<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __($subtitle) }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __($description) }}
        </p>
    </header>

    <form method="{{ $method }}" action="{{ route($action, $contact->id) }}" class="mt-6 space-y-6">
        @csrf
        @method($method)    

        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', $contact->nome ?? '')" required autofocus autocomplete="nome" placeholder="Nome" />
            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
        </div>

        <div>
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" :value="old('telefone', $contact->telefone ?? '')" maxlength="11" required autocomplete="telefone" placeholder="38999994444" />
            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
        </div>

        {{-- <div>
            <x-input-label for="busca" :value="__('Buscar:')" />
            <x-text-input id="busca" name="busca" type="text" class="mt-1 block w-full" required autocomplete="busca" />
            <x-input-error class="mt-2" :messages="$errors->get('busca')" />
        </div> --}}

        <div>
            <x-input-label for="cep" :value="__('CEP')" />
            <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" :value="old('cep', $contact->cep ?? '')" maxlength="8" autocomplete="cep" placeholder="33999444" />
            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
        </div>

        <div>
            <x-input-label for="logradouro" :value="__('Rua')" />
            <x-text-input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" :value="old('logradouro', $contact->logradouro ?? '')" maxlength="255" autocomplete="logradouro" />
            <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
        </div>

        <div>
            <x-input-label for="numero" :value="__('Nº')" />
            <x-text-input id="numero" name="numero" type="number" class="mt-1 block w-full" :value="old('numero', $contact->numero ?? '')" autocomplete="numero" />
            <x-input-error class="mt-2" :messages="$errors->get('numero')" />
        </div>

        <div>
            <x-input-label for="complemento" :value="__('Complemento')" />
            <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" :value="old('complemento', $contact->complemento ?? '')" maxlength="100" autocomplete="complemento" />
            <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
        </div>

        <div>
            <x-input-label for="bairro" :value="__('Bairro')" />
            <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" :value="old('bairro', $contact->bairro ?? '')" maxlength="50" autocomplete="bairro" />
            <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
        </div>

        <div>
            <x-input-label for="localidade" :value="__('Localidade')" />
            <x-text-input id="localidade" name="localidade" type="text" class="mt-1 block w-full" :value="old('localidade', $contact->localidade ?? '')" maxlength="50" autocomplete="localidade" />
            <x-input-error class="mt-2" :messages="$errors->get('localidade')" />
        </div>

        <div>
            <x-input-label for="estado" :value="__('Estado')" />
            <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $contact->estado ?? '')" maxlength="2" autocomplete="estado" placeholder="MG" />
            <x-input-error class="mt-2" :messages="$errors->get('estado')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
