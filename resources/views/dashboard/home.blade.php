@extends('layouts.dashboard')

@section('title', 'Dashboard - Home')

@section('content')
<div class="main-home">
    <div class="container-main">
        <div class="item">
            <span>Alunos cadastrados</span>
            <span>1234</span>
        </div>

        <div class="item">
            <span>Total de cursos</span>
            <span>1234</span>
        </div>

        <div class="item">
            <span>Usuários online</span>
            <span>1234</span>
        </div>
        @if($user->office > 1)
            <div class="item">
                <span>Professores da plataforma</span>
                <span>1234</span>
            </div>
        @endif
    </div>
</div>
@endsection