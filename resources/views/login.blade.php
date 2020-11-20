<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
    </head>

    <body class="flex items-center justify-center min-h-screen bg-platform-900">
        
        <div class="w-full max-w-md">
            
            <form method="POST" class="bg-platform-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @if(!empty($error))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{$error}}</span>
                    </div>
                @endif
                @csrf
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2" for="username">
                        E-mail
                    </label>
                    <input class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:shadow" name="email" id="username" type="email" placeholder="email">
                </div>
                <div class="mb-6">
                    <label class="block text-white text-sm font-bold mb-2" for="senha">
                        Senha
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white" name="password" type="password" placeholder="********">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button class="mr-2 bg-platform-200 hover:bg-platform-300 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Entrar
                        </button>
                        <a href="{{url('/')}}" class="text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline border border-white" type="submit">
                            Cancelar
                        </a>
                    </div>
                    <a class="inline-block align-baseline font-bold text-sm text-white hover:text-gray-400" href="{{url('register')}}">
                        Cadastre-se aqui.
                    </a>
                </div>
            </form>    
        </div>
    </body>
</html>