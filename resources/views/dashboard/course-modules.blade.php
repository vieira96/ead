@extends('layouts.dashboard')

@section('title', 'modules')

@section('content')
    <div class="main-modules">
        
        <div class="modules-container">
            @if($errors->any())
                @foreach ($errors->get('name') as $error)
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
            @foreach($modules as $module)
                <div class="module-single">
                    <div class="module-name">
                        <span>{{$module->name}}</span>
                    </div>
                    <div class="module-options">
                        <a href="{{url('dashboard/course/'.$course->id.'/module/'.$module->id.'/classes')}}">Exibir aulas</a>
                        <a href="{{url('dashboard/course/'.$course->id.'/module/'.$module->id.'/edit')}}">Editar modulo</a>
                        <a href="{{url('dashboard/course/'.$course->id.'/module/'.$module->id.'/delete')}}">Excluir modulo</a>
                    </div>
                </div>
            @endforeach
           
            <div class="new-module-container">
                <a class="btn" onclick="openForm()">Criar novo módulo</a>
            </div>

            <div class="new">
                <form method="POST" action="{{url('dashboard/course/'.$course->id.'/modules/new')}}">
                    @csrf
                    <div class="input-group">
                        <label for="name">Nome do módulo</label>
                        <input type="text" name="name" required>
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