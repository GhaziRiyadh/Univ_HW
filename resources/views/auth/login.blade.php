<x-guest-layout>

    <div class="w-full">
        @if (Session::get('message'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ Session::get('message') }}
            </div>
        @endif

        <form class="w-full" method="POST" action="{{ route('login') }}">
            @csrf

            <h1 class="text-xl text-gray-800 w-full text-center py-2">تسجيل الدخول</h1>

            <x-forms.input value="" type="email" label="" placeholder="اسم المستخدم" name="email" />
            <x-forms.input value="" type="password" label="" placeholder="كلمة السر" name="password" />


            <div class="flex items-center mt-4">

                <x-forms.button type="submit">
                    {{ __('تسجيل الدخول') }}
                </x-forms.button>
            </div>

            <a href="{{ route('register') }}"
                class="flex items-center justify-center my-2 font-semibold text-blue-500 hover:text-blue-600">
                او اظغط هنا لانشاء حساب
            </a>
        </form>
    </div>


</x-guest-layout>
