<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>{{$course->slug}}</title>
</head>
<body class="bg-platform-900">
    <header style="width: 100vw" class="flex items-center h-20 shadow shadow-lg fixed">
        <div class="lg:container lg:mx-auto w-full">
            <nav class="flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0 text-white w-auto">
                    <a href="{{url('/')}}" class="font-serif text-3xl tracking-tight px-2">Logo</a>
                </div>
                
                <div class="flex justify-end flex-grow lg:flex lg:items-center lg:w-auto flex-1">
                    <div class="flex">
                        @if($user)
                            @if($user->office > 0)
                                <a href="{{url('dashboard')}}" class="text-sm px-4 py-1 leading-none text-gray-400 mt-4 lg:mt-0 border rounded-2xl border-gray-200 bg-platform-800 mr-3 flex justify-center items-center">Dashboard</a>
                            @endif
                            <a href="{{url('campus')}}" class="text-sm px-4 py-1 leading-none text-gray-400 mt-4 lg:mt-0 border rounded-2xl border-gray-200 bg-platform-800 mr-3 flex justify-center items-center">Campus</a>
                            <a href="{{url('profile')}}" class="text-sm px-4 py-1 leading-none text-white mt-4 lg:mt-0 border rounded-2xl border-gray-200 flex justify-center items-center">Meu perfil</a>
                            <a href="{{url('logout')}}" class="text-sm px-2 py-2 leading-none text-white hover:text-gray-200 mt-4 lg:mt-0">Sair</a>
                        @else
                            <div class="flex flex-col">
                                <span class="text-sm px-4 py-2 leading-none text-white mt-4 lg:mt-0 hover:text-gray-200 cursor-pointer block" id="login">
                                    Entrar
                                </span>
                                <div id="ballon" class="ballon hide">
                                    <form action="{{url('login')}}" method="POST">
                                        @csrf
                                        <input style="width: 140px" type="email" name="email" placeholder="Email">
                                        <input type="password" name="password" placeholder="Senha">
                                        <input type="submit" value=">" placeholder="Senha">
                                    </form>
                                </div>
                            </div>
                            <a href="{{url('register')}}" class="text-sm px-2 py-2 leading-none text-white hover:text-gray-200 mt-4 lg:mt-0">
                                Registrar-se
                            </a>
                        @endif
                    </div>
                </div>
          </nav>
        </div>
    </header>
    
    <main style="top: 5rem;" class="flex fixed">
        <aside id="aside" class=" shadows shadow-2xl flex flex-col">   

            <ul>
                <li>
                    @foreach($modules as $module)
                        <div class="container-class w-full flex flex-col shadow shadow-lg">   
                            <span class="module flex justify-between items-center text-white shadow shadow-lg"><span>{{$module->name}}</span> <span class="text-gray-500">{{count($module->classes)}}</span></span>
                            <div class="class w-full flex flex-col p-5 pt-2">
                                @foreach($module->classes as $class_single)
                                    <a class="class-single w-full shadow shadow-lg flex justify-center items-center" href="{{url('campus/'.$course->slug.'/'.$class_single->id)}}">{{$class_single->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </li>

            </ul>
        </aside>

        <div class="menu"></div>
        <div class="main flex flex-col justify-center items-center">
            <div style="width: 90%" class="flex h-10 mb-3 mt-3 items-center text-white"><span       class="mr-10">Modulo: {{$class->module_id}}</span><span>Aula: {{$class->id}}</span></div>
            <div style="width: 90%; height: 80vh;">
                <iframe width="100%" height="100%" src="{{$class->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </main>

    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>