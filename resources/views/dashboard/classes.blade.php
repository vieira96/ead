@extends('layouts.dashboard')

@section('title', 'modules')

@section('content')
    <div class="main-class">
        
        <div class="class-container">
            @if($errors->any())
                @foreach ($errors->get('name') as $error)
                    <div class="alert error">
                        {{$error}}
                    </div>
                @endforeach

                @foreach ($errors->get('video') as $error)
                    <div class="alert error">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            @if(!empty($success))
                <div class="alert success">
                    {{$success}}
                </div>
            @endif
            @foreach($classes as $class)
                <div class="class-single">
                    <div class="class-name">
                        <span>{{$class->name}}</span>
                    </div>
                    <div class="class-options">
                        <a href="{{url('dashboard/course/'.$course->id.'/module/'.$module->id.'/class/'.$class->id.'/edit')}}">Editar modulo</a>
                        <a href="{{url('dashboard/course/'.$course->id.'/module/'.$module->id.'/class/'.$class->id.'/del')}}">Excluir modulo</a>
                    </div>
                </div>
            @endforeach
           
            <div class="new-class-container">
                <a class="btn" onclick="openForm()">Criar nova aula</a>
            </div>

            <div class="new">
                <form method="POST" action="{{url('dashboard/course/'.$course->id.'/module/'.$module->id.'/class/new')}}">
                    @csrf
                    <div class="input-group">
                        <label for="name">Nome da aula</label>
                        <input type="text" name="name" required>

                        <label for="video">Video da aula</label>
                        <input type="url" name="video" required>
                    </div>
                    
                    <div class="send-cancel">
                        <input type="submit" class="btn" value="Criar">
                        <a class="btn light" onclick="closeForm()">Cancelar</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection