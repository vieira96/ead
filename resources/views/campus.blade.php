@extends('layouts.app')

@section('title', 'Titulo')

@section('content')
    <div class="bg-platform-800 h-40 flex">
        <div class="lg:container lg:mx-auto flex w-full">
            <div class="flex flex-col h-full justify-center flex-1 pl-2">
                <h2 class=" text-2xl text-white font-light">Olá, {{$first_name}}</h2>
                <h3 class="font-light text-white">Você está matriculado em {{count($course_list)}} @if(count($course_list) > 1)cursos. @else curso. @endif</h3>
            </div>
            <div class="flex h-full flex-1 items-center justify-end">
                <a href="#"><img class=" w-12" src="{{asset('image/message.svg')}}"></a>
            </div>
        </div>
    </div>

    <div class="mt-5 h-20">
        <div class="h-full lg:container border border-gray-400 lg:mx-auto rounded-2xl flex items-center pl-2 text-gray-300">
            <p>Ultimas Aulas assistidas:</p>
            <nav class="w-full">
                <ul class="flex w-full justify-around">
                    <li>aula 1: titulo da aula</li>
                    <li>aula 2: titulo da aula</li>
                    <li>aula 3: titulo da aula</li>
                    <li>aula 4: titulo da aula</li>
                    <li>aula 5: titulo da aula</li>
                </ul>
            </nav>
        </div>
    </div>
    @if(count($course_list) > 0)
        <div class="lg:container lg:mx-auto pt-5">
            <h1 class="text-3xl font-light text-white pb-5 pl-2">Meus cursos</h1>
            <div class="flex flex-wrap justify-items-stretch">

                @foreach($course_list as $course)
                    <div class="w-course p-2">
                        <div class="min-h-full max-w-sm rounded overflow-hidden shadow-lg flex items-center flex-col">
                            <img style="height: 200px;" class="w-full" src="{{asset('image/courses/'.$course->image)}}">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl text-gray-400 mb-2 text-3xl">{{$course->name}}</div>
                            </div>
                            <div style="width: 80%" class="px-6 pt-4 pb-2 flex flex-col">
                                <a href="{{url('/campus/'.$course->slug)}}"><span class="rounded-full px-3 py-1 text-sm font-semibold text-gray-300 mr-2 mb-2 border border-gray-500 w-full flex justify-center">Ir para o curso</span></a>
                                <span class="rounded-full px-3 py-1 text-sm font-semibold text-gray-300 mr-2 mb-2 border border-gray-500 w-full flex justify-center">100%</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    <div class="w-full bg-platform-800 mt-10 h-56">
        <div class="lg:container lg:mx-auto h-full flex">
            <div class="flex-1 p-1 flex justify-center">
                <div>
                    <h2 class=" text-3xl text-gray-400 font-serif">Últimos cursos adicionados na plataforma</h2>
                    <ul class="p-1">
                        
                        @foreach ($all_courses as $key => $course)
                            @if($key != 6)
                                <li><a class="text-gray-300 hover:text-gray-400" href="{{url('course/'.$course->slug)}}">{{$course->name}}</a></li>
                            @else
                                <li><a class="text-gray-400 hover:text-gray-500" href="{{url('/cursos')}}">Ver todos</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex-1 p-1 flex justify-center">
                <div>
                    <h2 class=" text-3xl text-gray-400 font-serif">Contato</h2>
                    <ul class="p-1">
                        <li class="text-gray-300">E-mail:<a href="#"> samuelvieiradasilva96@hotmail.com</a></li>
                        <li class="text-gray-300"><a href="#">Contato pela plataforma</a></li>
                        <li class="text-gray-300">Telefone: (22) 992747637</li>
                    </ul>
                </div>
            </div>

            
        </div>
    </div>

    {{-- <script>
        function tecla(){
          window.alert("O código da tecla pressionada foi: " + event.keyCode);
        }
        
        document.body.onkeypress = tecla;
    </script> --}}

    {{-- <script>
        var palavra;
        const qualquerNome = document.querySelectorAll('p span');
        const qualquerNomeArray = Array.from(qualquerNome);
        qualquerNomeArray.forEach(item => 
            console.log(palavra = item.innerText.length),
        );
    </script> --}}
@endsection
