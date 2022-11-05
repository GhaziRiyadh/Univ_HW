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
            action="{{ route('meal', ['meal' => $meal?->id]) }}">
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
                        name="title" />
                    <x-forms.desc value="{{ $meal?->desc }}" label="" placeholder="الوصف" name="desc" />
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
        </form>
    </div>

</x-guest-layout>
