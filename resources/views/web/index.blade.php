<x-layouts.web :user="$user">
    <div class=" flex flex-col items-center justify-center">
        @foreach ($meals as $meal)
            <x-web.menu-card id="{{ $meal->id }}" image="{{ $meal->image }}" desc="{{ $meal->desc }}"
                title="{{ $meal->title }}" />
        @endforeach
    </div>

</x-layouts.web>
