<x-guest-layout>
    <div class="w-full">
        @if ($errors)
            @foreach ($errors as $error)
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form enctype="multipart/form-data" class="w-full" method="POST" action="{{ route('register') }}">
            @csrf

            <h1 class="text-xl text-gray-800 w-full text-center py-2">انشاء حساب</h1>

            <div class="flex w-full ">
                <div class="w-2/3 flex flex-col items-center justify-center pr-4">
                    <x-forms.input type="text" label="" placeholder="الاسم" name="name" />
                    <x-forms.input type="text" label="" placeholder="التلفون" name="phone_number" />
                    <x-forms.input type="email" label="" placeholder="الايميل" name="email" />
                    <x-forms.input type="password" label="" placeholder="كلمة السر" name="password" />
                    <x-forms.input type="password" label="" placeholder="تأكيد كلمة السر"
                        name="password_confirmation" />
                </div>

                <x-add-image />
            </div>


            <div class="flex items-center mt-4">

                <x-forms.button type="submit">
                    {{ __('انشاء حساب') }}
                </x-forms.button>
            </div>

            <a href="{{ route('login') }}"
                class="flex items-center justify-center my-2 font-semibold text-blue-500 hover:text-blue-600">
                او اظغط هنا لتسجيل الدخول
            </a>
        </form>
    </div>

</x-guest-layout>
