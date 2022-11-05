<x-guest-layout>
    <div class="w-full">
        @if ($errors)
            @foreach ($errors as $error)
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form enctype="multipart/form-data" class="w-full" method="POST"
            action="{{ is_null($meal) ? route('register') : route('update', ['meal' => $meal->id]) }}">
            @csrf

            <h1 class="text-xl text-gray-800 w-full text-center py-2">
                @if (is_null($meal))
                    {{ __('انشاء وجبة') }}
                @else
                    تعديل الوجبة
                @endif
            </h1>

            <div class="flex w-full ">
                <div class="w-2/3 flex flex-col items-center justify-center pr-4">
                    <x-forms.input value="{{ $meal?->title }}" type="text" label="" placeholder="الاسم"
                        name="name" />
                    <x-forms.input value="{{ $meal?->desc }}" type="text" label="" placeholder="الوصف"
                        name="desc" />
                </div>

                <x-add-image default-image="{{ $meal?->image }}" />
            </div>


            <div class="flex items-center mt-4">

                <x-forms.button type="submit">
                    @if (is_null($meal))
                        {{ __('انشاء وجبة') }}
                    @else
                        تعديل
                    @endif
                </x-forms.button>
            </div>
            @if (is_null($meal))
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center my-2 font-semibold text-blue-500 hover:text-blue-600">
                    او اظغط هنا لتسجيل الدخول
                </a>
            @endif
        </form>
    </div>

</x-guest-layout>
