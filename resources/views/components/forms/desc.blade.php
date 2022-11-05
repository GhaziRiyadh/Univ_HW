<label dir="rtl" class="w-full block my-2">
    @if ($label)
        <span class="">{{ $label }}</span>
    @endif
    <textarea class="focus:ring-0 w-full h-48 border-1 border-gray-700 focus:border-gray-700 rounded-md "
        placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>
    @error($name)
        <span class="text-sm text-red-500 p-1">{{ $message }}</span>
    @enderror
</label>
