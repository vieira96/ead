@extends('layouts.dashboard')

@section('title', 'Dashboard - Courses')

@section('content')
    <div class="main-courses">
        @foreach($courses as $course)
        <div class="course-container">
            <div class="course-info">
                <img src="{{asset('/image/courses/'.$course->image)}}" style="height: 100px; width: 100%;">
                <span>{{$course->name}}</span>
            </div>
            <div class="course-options">
                <a class="course-options--item" href="">Alunos inscritos</a>
                <a class="course-options--item" href="{{url('dashboard/course/'.$course->id.'/modules')}}">Módulos do curso</a>
                <a class="course-options--item" href="{{url('dashboard/course/'.$course->id.'/edit')}}">Editar curso</a>
                <a class="course-options--item" href="{{url('dashboard/course/'.$course->id.'/delete')}}" onclick="return confirm('Deseja realmente apagar o curso?')">Apagar curso</a>
            </div>
        </div>
        @endforeach        
    </div>
@endsection