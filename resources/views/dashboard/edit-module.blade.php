@extends('layouts.dashboard')

@section('title', 'Editando modulo - '.$module->name)

@section('content')
    <div class="main-edit-module">
       
        <h1>Editando módulo: {{$module->name}}.</h1>
        <form method="POST">
            @if($errors->any())
                @foreach ($errors->get('name') as $error)
                    <div class="alert error">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            @csrf
            <label for="name">Nome do modulo</label>
            <input type="text" name="name" value="{{$module->name}}">
            <div class="buttons-area">
                <input type="submit" value="Salvar">
                <button class="btn">cancelar</button>
            </div>
        </form>
    </div>
@endsection