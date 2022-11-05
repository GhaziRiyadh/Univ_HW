<div dir="rtl"
    class="w-3/4 h-72 rounded-xl flex {{ $id % 2 ? 'flex-row-reverse' : 'flex-row' }} items-center justify-between my-4 border-2 border-gray-700">
    <img src="{{ $image }}" class="h-full w-1/2 object-cover {{ $id % 2 ? 'rounded-l-lg' : 'rounded-r-lg' }}"
        alt="">
    <div class=" h-full py-2 px-4 w-1/2 flex flex-col justify-bettween">
        <div>
            <h1 class=" text-xl font-bold capitalize my-2 border-b ">{{ $title }}</h1>
            <p class="text-sm px-1 overflow-hidden whitespace-normal">{{ $desc }}</p>
        </div>
        <div class="mt-auto mb-1">
            <a href="{{ route('meal', ['meal' => $id]) }}"
                class="border border-gray-700 bg-yellow-300 text-gray-900 py-1 px-2 rounded-md text-base hover:bg-yellow-200 hover:shadow-md capitalize">
                تعديل
            </a>
            <a href="{{ route('meal.destroy', ['meal' => $id]) }}"
                class="border border-gray-700 mx-2 bg-red-700 text-white py-1 px-2 rounded-md text-base hover:bg-red-800 hover:shadow-md capitalize">
                حذف
            </a>
        </div>
    </div>
</div>
