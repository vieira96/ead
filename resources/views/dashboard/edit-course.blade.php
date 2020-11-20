@extends('layouts.dashboard')

@section('title', 'edit - '.$course->name)

@section('content')
    <div class="form-container">
        <h1>Editando o curso: {{$course->name}}</h1>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            @if(!empty($success))
                <div style="margin-bottom: 20px" class="alert success">
                    {{$success}}
                </div>
            @endif
            <div class="form-image">
                <div class="current-image">
                    <img src="{{asset('image/courses/'.$course->image)}}" alt="">
                </div>
                <div class="image-input">
                    <label for="image">
                        Nova imagem
                    </label>
                    <input type="file" name="image" accept=".jpg, .jpeg, .png">
                    @foreach ($errors->get('image') as $error)
                        <div class="alert danger">{{$error}}</div>
                    @endforeach
                </div> 
            </div>
            <label for="name">
                Nome
            </label>
            <input type="text" name="name" value="{{$course->name}}">
            @foreach ($errors->get('name') as $error)
                <div class="alert danger">{{$error}}</div>
            @endforeach 
            <label for="description">
                Descrição
            </label>
            <textarea name="description" cols="30" rows="5" maxlength="255" required>{{$course->description}}</textarea>
            <span>! A descrição poder ter no máximo 255 caracteres.</span>
            @foreach ($errors->get('description') as $error)
                <div class="alert danger">{{$error}}</div>
            @endforeach 
            <input type="submit" value="Editar curso">
                    
        </form>
    </div>
@endsection