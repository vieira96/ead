@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="lg:container lg:mx-auto">
        <div style="height: 32rem" class="w-full flex justify-center items-center">
            <div class="lg:flex">
                <div class="lg:flex-shrink-0 flex justify-center">
                    <img style="width: 400px" class="rounded-md rounded-full" src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=448&q=80" width="448" height="299" alt="Woman paying for a purchase">
                </div>
                <div class="mt-4 md:mt-0 md:ml-6 flex flex-col items-center">
                    <div class="tracking-wide text-sm text-white text-3xl">Quem somos</div>
                    <p class="pl-3 mt-2 text-gray-200 font-light">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers aaaaaaaaaaaaaaa bbbbbbbbb ccccccccc ddddddd eeeeeeeeee ffffffffff ggggggggg hhhhhh.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:container lg:mx-auto">
        <h1 class=" text-2xl text-white font-light mt-6">Todos os nossos cursos</h1>
        <div class="flex flex-wrap justify-items-stretch mb-10 pl-3">
            @foreach($course_list as $course)
                <div class="flex flex-col w-course mt-5">
                    <div class="w-full h-full flex flex-col">
                        <div class="min-h-full rounded overflow-hidden shadow-lg flex items-center flex-col text-gray-300">
                            <img style="height: 200px;" class="w-full" src="{{asset('image/courses/'.$course->image)}}">
                            <div class="flex-1 flex flex-col items-center">
                                <p class="px-6 py-4font-bold text-xl text-gray-400 mb-2 text-3xl">{{$course->name}}</p>
                                <p class="px-6 pt-4 pb-2 break-words text-center">{{$course->description}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="h-8 w-full">
                        <div class="bg-green-800 h-full w-full flex justify-center items-center text-gray-300">
                            <a href="{{url('course/'.$course->slug)}}">Ver curso</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
