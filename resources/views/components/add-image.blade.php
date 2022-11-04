<div class="w-1/3 border-l border-l-gray-700 flex flex-col items-center justify-evenly">
    <h1 class="text-xl text-gray-800 w-full text-center py-2">تسجيل الدخول</h1>
    <div class="w-48 my-4 h-48 bg-gray-300 border border-gray-500 rounded-lg ">
        <img class="w-full h-full rounded-lg" id="userImage" alt="" srcset="">
    </div>
    <label for="image"
        class="border border-gray-700 cursor-pointer bg-yellow-300 text-gray-900 py-1 px-2 rounded-md text-base
    hover:bg-yellow-200 hover:shadow-md">
        تصفح الملفات
    </label>
    <input onchange="setImage" type="file" id="image" name="image" class="hidden" accept="image/*">
</div>

<script>
    let image = document.getElementById('userImage')
    image.classList.add('hidden')

    function setImage(event) {
        console.log('event');
        image.setAttribute('src', URL.createObjectURL(event.target.files[0]));
        image.classList.remove('hidden')
    }

    let input = document.getElementById('image')
    input.addEventListener('change', setImage)
</script>
