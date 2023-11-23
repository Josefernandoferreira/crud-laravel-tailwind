@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full sm:w-8/12 md:w-6/12 lg:w-4/12 xl:w-12/12">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="text-lg font-semibold mb-6">{{ __('Login') }}</div>
                    <img src="/img/logo.png">
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="input-group-1" class="block mb-2 text-sm text-gray-900 dark:text-white font-semibold">E-mail:</label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"></div>
                        <input type="text" id="input-group-1" name="email" value="{{ old('email') }}" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@dominio.com" required>
                        @error('email')
                        <span class="text-red-500 text-sm mt-2 mr-2">Usuário ou senha incorreto.</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm text-gray-700  font-semibold">Senha:</label>
                        <input type="password" id="input-group-1" name="password" value="{{ old('email') }}" class="@error('password') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required autocomplete="current-password">
                        @error('password')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input class="form-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2  font-semibold">Lembrar</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-red-600 text-white hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900  font-semibold">Entrar</button>
                        <a class="nav-link text-red-500  font-semibold" href="{{ route('register') }}">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection