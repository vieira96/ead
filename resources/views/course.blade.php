@extends('layouts.app')

@section('title', $course->name)
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@section('content')
	<div class="lg:container lg:mx-auto mt-10 mb-10 course flex items-center">
		<div class="lg:flex flex-1">
			<div class="lg:flex-shrink-0 flex justify-center items-center flex-col">
				<img style="width: 500px; height: 300px;" class="rounded-lg transition duration-500 transform hover:-translate-y-1 hover:scale-110" src="{{asset('image/courses/'.$course->image)}}" width="448" height="299">
				<div class="rating-area-int mt-3">
					<div class="estrelas">
						@for ($i = 0; $i < 5; $i++)
							@if($i < $rating_average)
								<span class="fa fa-star checked"></span>
							@else
								<span class="fa fa-star"></span>
							@endif
						@endfor
					</div>
				</div>
			</div>

			<div class="mt-4 md:mt-0 md:ml-6 flex justify-center items-center flex-col flex-1 pl-3 pr-3">
				<div class="uppercase tracking-wide text-sm text-gray-400 font-bold">Categoria: Programação</div>
				<p class="block mt-1 text-lg leading-tight font-light text-gray-300">{{$course->name}}</p>
				<p class="mt-2 text-gray-200 font-light break-words">{{$course->description}}</p>
				@if($user)
					@if($is_student)
						<a class="transition duration-300 transform hover:-translate-y-1 hover:scale-110 text-white border p-2 rounded-3xl border-gray-300 mt-3 bg-gray-600" href="{{url('campus/'.$course->slug)}}">Ir para o curso</a>
					@else
						<a class="transition duration-300 transform hover:-translate-y-1 hover:scale-110 text-white border p-2 rounded-3xl border-gray-300 mt-3 bg-gray-600" href="{{url('course/'.$course->slug.'/subscribe')}}">Inscrever-se</a>
					@endif
				@else
					<a class="transition duration-300 transform hover:-translate-y-1 hover:scale-110 text-white border p-2 rounded-3xl border-gray-300 mt-3 bg-gray-600" href="{{url('/register')}}">Cadastre-se para ter acesso ao curso</a>
					<p class="text-white">Ou</p>
					<a class="transition duration-300 transform hover:-translate-y-1 hover:scale-110 text-white border p-2 rounded-3xl border-gray-300 mt-3 bg-gray-600" href="{{url('/login')}}">Entre com a sua conta</a>
				@endif
			</div>
		</div>
	</div>

	@if(count($ratings) > 0)
		<div class="w-full">
			<div class="lg:container lg:mx-auto">
				<h1 class="text-2xl font-light text-white mb-5">Comentarios dos alunos sobre o curso</h1>
				<div class="flex flex-wrap">
					@foreach ($ratings as $rating)	
						<div class="w-full flex w-ratings mr-2">
							<div class="md:flex mt-2 border rounded rounded-2xl p-3 w-full border-gray-500">
								<div class="lg:flex-shrink-0 flex justify-center items-center">
									<img style="width: 80px; height: 80px;" class="rounded-md rounded-full" src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=448&q=80">
								</div>
								<div class="mt-4 md:mt-0 md:ml-6 flex flex-col items-center flex-1">
									<div class="tracking-wide text-sm w-full">
										<div class="rating-area-int">
											<div class="estrelas">
												@for ($i = 0; $i < 5; $i++)
													@if($i < $rating->stars)
														<span class="fa fa-star checked"></span>
													@else
														<span class="fa fa-star"></span>
													@endif
												@endfor
											</div>
										</div>
									</div>
									<p class="mt-2 text-gray-200 font-light break-words">{{$rating->body}}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endsection