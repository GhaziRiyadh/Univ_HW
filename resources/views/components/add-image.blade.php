<div class="w-1/3 border-l border-l-gray-700 flex flex-col items-center justify-evenly">
    <h1 class="text-xl text-gray-800 w-full text-center py-2">رفع صورة</h1>
    <div class="w-48 my-4 h-48 bg-gray-300 border border-gray-500 rounded-lg ">
        @if ($defaultImage)
            <img class="w-full h-full rounded-lg object-cover" src="{{ $defaultImage }}" id="userImage" alt=""
                srcset="">
        @endif
    </div>
    <label for="image"
        class="border border-gray-700 cursor-pointer bg-yellow-300 text-gray-900 py-1 px-2 rounded-md text-base
    hover:bg-yellow-200 hover:shadow-md">
        تصفح الملفات
    </label>
    @if ($defaultImage)
        <input type="hidden" value="{{ $defaultImage }}" name="image">
    @endif
    <input onchange="setImage" type="file" id="image" name="image" hidden accept="image/*">
    @error('image')
        <span class="text-sm text-red-500 p-1">{{ $message }}</span>
    @enderror
</div>

<script>
    let image = document.getElementById('userImage')

    function setImage(event) {
        console.log('event');
        image.setAttribute('src', URL.createObjectURL(event.target.files[0]));
    }

    let input = document.getElementById('image')
    input.addEventListener('change', setImage)
</script>
