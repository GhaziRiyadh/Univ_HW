<x-layouts.web :user="$user">
    <div class="w-3/4 flex flex-col items-center">
        @foreach ($meals as $meal)
            <x-web.menu-card :meal="$meal" />
        @endforeach
    </div>

</x-layouts.web>
