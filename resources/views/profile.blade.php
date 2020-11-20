@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="w-full mt-10 mb-10 profile-content flex items-center justify-center">
        <div class="lg:container lg:mx-auto flex justify-center">
            <form action="{{url('edit')}}" class="w-full max-w-lg" method="POST">
                @if(!empty($success))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded flex justify-center mb-3" role="alert">
                        <span class="block sm:inline">{{$success}}</span>
                    </div>  
                @endif
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-300 text-xs font-bold mb-2">
                            E-mail
                        </label>
                        <input class="appearance-none block w-full bg-gray-300 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{$user->email}}" disabled>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-300 text-xs font-bold mb-2">
                            Nome
                        </label>
                        <input class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" value="{{$user->name}}" name="name" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-300 text-xs font-bold mb-2">
                            Senha
                        </label>
                        <input class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password" placeholder="********" name="password">
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-300 text-xs font-bold mb-2">
                            Confirmar Senha
                        </label>
                        <input class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password" placeholder="********" name="confirm-password">
                    </div>

                    <div class="w-full md:w-2/2 px-3 flex justify-center">
                        <input class="appearance-none block bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight cursor-pointer w-20" type="submit" value="Salvar">
                    </div>
                    
                </div>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert danger">{{$error}}</div>
                    @endforeach
                @endif
            </form>
        </div>
    </div>
@endsection