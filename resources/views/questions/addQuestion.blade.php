@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-blue-100 p-6 rounded-lg">
            <form action="{{ route('ask') }}" method="post">
                @csrf
                <textarea value="{{ old('name') }}" class="@error('body') border-red-500 @enderror w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" placeholder="Type your question here......" name="body"></textarea>
                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                @if(Session::has('warning'))
                <div class="text-red-500 mt-2 text-sm">
                    {{Session::get('warning')}}
                </div>
                @endif
                <button class="pl-8 pr-8 mt-2 float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Post
                </button>
            </form>
        </div>
    </div>
@endsection