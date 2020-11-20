@extends('layouts.dashboard')

@section('title', 'New course')

@section('content')
    <div class="form-container">
        <h1>Criar novo curso</h1>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="image">
                Imagem
            </label>
            <input type="file" name="image" accept=".jpg, .jpeg, .png" required>
            @foreach ($errors->get('image') as $error)
                <div class="alert danger">{{$error}}</div>
            @endforeach 
            <label for="name">
                Nome
            </label>
            <input type="text" name="name" value="{{old('name')}}" required>
            @foreach ($errors->get('name') as $error)
                <div class="alert danger">{{$error}}</div>
            @endforeach 
            <label for="description">
                Descrição
            </label>
            <textarea name="description" cols="30" rows="5" maxlength="255" required>{{old('description')}}</textarea>
            <span>! A descrição poder ter no máximo 255 caracteres.</span>
            @foreach ($errors->get('description') as $error)
                <div class="alert danger">{{$error}}</div>
            @endforeach 
            <input type="submit" value="Enviar novo curso">
                    
        </form>
    </div>
@endsection
