@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class=" w-8/12 bg-blue-100 p-6 rounded-lg">
            @if ($message = Session::get('error'))
            <div class="mb-4 bg-red-500">
                <strong>{{ $message }}</strong>
            </div>
            @endif
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
                <div class=" shadow-lg bg-white rounded-lg p-5 mb-8">
                    <form action="/questions/remove/{{ $question->id }}" method="post">
                        @csrf
                        <input type="hidden" name="q_id" id="q_id" value="{{ $question->id }}" />
                        <button class="float-right hover:bg-red-100 p-1">❌</button>
                    </form>
                    <div class="p-4">
                        <h1 class="text-3xl">{{ $question->body }}</h1>
                    </div>
                    <a href="/questions/{{ $question->id }}"><p class=" hover:text-blue-700 text-gary-800 text-right text-lg p-2 font-bold">{{ $question->answers->count() }} 💬</p></a>
                    @foreach ($question->answers as $ans )
                    <div class="overflow-hidden shadow-lg bg-white rounded-lg p-2 mb-4">
                        <form action="/questions/delete/{{ $ans->id }}" method="post">
                            @csrf
                            <input type="hidden" name="ans_id" id="ans_id" value="{{ $ans->id }}" />
                            <input type="hidden" name="q_id" id="q_id" value="{{ $question->id }}" />
                            <button class="float-right p-1 mb-2">⛔</button>
                        </form>
                        <h3 class="text-lg pt-4 pb-1">{{ $ans->body }}</h3>
                        <small class="text-gray-400 float-right">{{ $ans->created_at }}</small>
                    </div>
                    @endforeach
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

        </div>
    </div>
@endsection