<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
</div>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-screen min-h-screen">
    <nav class="w-full fixed top-0 left-0 bg-white grid grid-cols-3 gap-4 py-4 h-16 shadow">
        <div class=" h-full w-full px-4 ">
            <div class="flex">
                <div class="h-10 w-10 my-auto rounded-md mx-1 bg-gray-300">
                    @if ($user?->image)
                        <img src="{{ $user->image }}" class="w-full h-full object-cover rounded-md" alt=""
                            srcset="">
                    @endif
                </div>
                <div class="text-sm my-auto">
                    @if ($user?->name)
                        <p class="text-gray-700 font-semibold ">{{ $user->name }}</p>
                    @endif
                    <div class="flex">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button class="px-1 hover:underline text-yellow-800">logout</button>
                        </form>
                        <a href="{{ route('update', ['user' => $user->id]) }}"
                            class="px-1 hover:underline text-yellow-800">update</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="text-xl font-semibold text-center">
            مطعم الـــــــــــ
        </div>
        <div></div>
    </nav>
    <div class=" w-full h-screen overflow-auto pt-16">
        {{ $slot }}
    </div>

    <a href="{{ route('meal') }}"
        class="fixed bottom-8 right-8 text-4xl text-yellow-800 rounded-md h-10 w-10 shadow bg-gray-300 flex items-center justify-center hover:bg-yellow-700 hover:text-white">
        +
    </a>

</body>

</html>
