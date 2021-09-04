<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q & A</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-white">
    <nav class="p-6 bg-blue-100 flex justify-between mb-3">
        <h3 class="font-bold">Stack<small>underflow</small></h3>

        <ul class="flex items-center">

                <li class="p-3 hover:bg-gray-100">
                    <a href="{{ route('questions') }}">Questions</a>
                </li>
                <li class="p-3 hover:bg-gray-100">
                    <a href="{{ route('ask') }}">Ask</a>
                </li>
            

        </ul>
    </nav>
    
    @yield('content')
</body>


</html>
