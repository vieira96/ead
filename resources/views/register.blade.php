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
        <form class="w-full max-w-sm" method="POST">
            @if(!empty($error))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{$error}}</span>
                </div>
            @endif
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-white font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-nome">
                    Nome Completo
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" name="name" id="inline-nome" type="text" placeholder="Fulano" value="{{old('name')}}">
                </div>
            </div>
            @if($errors->get('name'))
				<div class="md:flex md:items-center mb-6">
					<div class="md:w-1/3">
					</div>
					<div class="md:w-2/3">
						@foreach ($errors->get('name') as $error)
						<div class="alert danger">{{$error}}</div>
						@endforeach 
					</div>
				</div>
            @endif
            

            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-white font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-email">
                  E-mail
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" name="email" id="inline-email" type="email" placeholder="exemplo@email.com" value="{{old('email')}}">
              </div>
			</div>
			@if($errors->get('email'))
				<div class="md:flex md:items-center mb-6">
					<div class="md:w-1/3">
					</div>
					<div class="md:w-2/3">
						@foreach ($errors->get('email') as $error)
						<div class="alert danger">{{$error}}</div>
						@endforeach 
					</div>
				</div>
            @endif

            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-white font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
                  Senha
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" name="password" id="inline-password" type="password" placeholder="********">
              </div>
			</div>
			
			@if($errors->get('password'))
				<div class="md:flex md:items-center mb-6">
					<div class="md:w-1/3">
					</div>
					<div class="md:w-2/3">
						@foreach ($errors->get('password') as $error)
						<div class="alert danger">{{$error}}</div>
						@endforeach 
					</div>
				</div>
            @endif

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-white font-bold md:text-left mb-1 md:mb-0 pr-4" for="confirm-password">
                    Confirmar Senha
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" name="confirm-password" id="password" type="password" placeholder="********">
                </div>
			</div>

			@if($errors->get('confirm-password'))
				<div class="md:flex md:items-center mb-6">
					<div class="md:w-1/3">
					</div>
					<div class="md:w-2/3">
						@foreach ($errors->get('confirm-password') as $error)
						<div class="alert danger">{{$error}}</div>
						@endforeach 
					</div>
				</div>
            @endif

            {{-- <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3"></div>
              <label class="md:w-2/3 block text-gray-500 font-bold">
                <input class="mr-2 leading-tight" type="checkbox">
                <span class="text-sm">
                    Me envie novidades.
                </span>
              </label>
            </div> --}}

            <div class="md:flex md:items-center">
              <div class="md:w-1/3"></div>
              <div class="md:w-2/3">
                <div class="flex items-center">
                  <button class="bg-platform-200 hover:bg-platform-300 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">
                      Cadastrar 
                  </button>
                  <a href="{{url('/')}}" class="text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline border border-white" type="submit">
                      Cancelar
                  </a>
                </div>
                <a class="inline-block align-baseline font-bold text-sm text-white hover:text-gray-400" href="{{url('login')}}">
                    Já tem conta? Fazer Login.
                </a>
              </div>
            </div>
        
        </form>
        
    </body>
</html>