@props(['name'])
@error($name)
    <p class="text-red text-xs mt-0">{{ $message }}</p>
@enderror
