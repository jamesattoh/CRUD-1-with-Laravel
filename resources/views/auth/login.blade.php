<x-layout>

    <x-slot:heading>
        Log in
    </x-slot>

<form method="POST" action="/login">
    @csrf

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">


        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <x-form-field>
                <x-form-label for="email">Email</x-form-label>

                <div class="mt-2">
                  <x-form-input name="email" id="email" type="email" :value="old('email')" required/>

                  <x-form-error name="email"/>
                </div>
            </x-form-field>


            <x-form-field>
                <x-form-label for="password">Password</x-form-label>

                <div class="mt-2">
                  <x-form-input name="password" id="password" type="password" required/>

                  <x-form-error name="password"/>
                </div>
            </x-form-field>

        </div>

        {{-- gestion de champ invalide --}}
            {{-- <div class="mt-10">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error )
                            <li class="text-red-500 italic">
                                {{$error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div> --}}
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

      <x-form-button>Log in</x-form-button>
    </div>
  </form>

</x-layout>
