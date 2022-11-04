<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>learn blade</title>
    <script>
        let name = 'root';
    </script>
</head>

<body>
    @php
        $name = 'root';
    @endphp
    {{ $name }}

    @if (true)
        <h1>if condation</h1>
    @endif

    @unless(true)
        <h1>unless </h1>
    @endunless

    @auth
        user is auth
    @endauth

    @guest
        user not auth
    @endguest

    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}
    @endfor

    {{-- @foreach ($users as $user)
        <p>This is user {{ $user->id }}</p>
    @endforeach

    @forelse ($users as $user)
        <li>{{ $user->name }}</li>
    @empty
        <p>No users</p>
    @endforelse --}}

    {{-- @while (true)
        <p>I'm looping forever.</p>
    @endwhile --}}

    {{-- @foreach ($users as $user)
        @foreach ($user->posts as $post)
            @if ($loop->parent->first)
                This is the first iteration of the parent loop.
            @endif
        @endforeach
    @endforeach --}}

    @php
        $isActive = true;
    @endphp
    <span @class(['p-4', 'font-bold' => $isActive])>root</span>

    <div :class="root: isActive"></div>
</body>

</html>
