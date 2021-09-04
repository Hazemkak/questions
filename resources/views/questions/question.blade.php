@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        
        <div class=" w-8/12 bg-blue-100 p-6 rounded-lg">

            <p class="text-xs text-gray-500 mb-4">Total {{ $questions->count() }} posts</p>
            @if ($message = Session::get('success'))
            <div class="mb-4 bg-green-500 ">  
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @error('answer')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            @foreach ($questions as $question)
                <div class=" shadow-lg bg-white rounded-lg p-5 mb-8">
                    <form action="/questions/remove/{{ $question->id }}" method="post">
                        @csrf
                        <input type="hidden" name="q_id" id="q_id" value="{{ $question->id }}" />
                        <button class="float-right hover:bg-red-100 p-1">❌</button>
                    </form>
                    <div class="p-4">
                        <h2 class="text-xl">{{ $question->body }}</h2>
                    </div>
                    <a href="/questions/{{ $question->id }}"><p class=" hover:text-blue-700 text-gary-800 text-right text-lg p-2 font-bold">{{ $question->answers->count() }} 💬</p></a>
                    
                    <hr class="mb-2">
                    <div class="hero bg-white h-200px flex flex-col px-2">
                        <div class="search-box mx-auto my-auto w-full sm:w-full md:w-full lg:w-3/4 xl:w-3/4">
                            <form class="flex flex-row" action="{{ route('questions') }}" method="post">
                                @csrf
                                <input type="hidden" name="post_id" id="post_id" value="{{ $question->id }}" />
                                <input
                                    class="bg-gray-100  font-normal text-grey-darkest border border-gray-100 font-bold w-full py-1 px-2 outline-none text-lg text-gray-600"
                                    name="answer" type="text" placeholder="Answer now....." value={{ old('answer') }}>
                                <span
                                    class="flex items-center bg-blue-800 rounded rounded-l-none border-0 px-3 font-bold">
                                    <button
                                        class="bg-gredient-dark  text-lg text-white font-bold py-3 px-6 rounded">Answer</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection