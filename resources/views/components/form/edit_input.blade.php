@props(['name','type' => 'text','margin' => '','value' => ''])

<div class="col-12 {{ $margin }}">
    <div class="form-group">
        <label for="{{ $name }}">{{ ucwords($name) }}</label>
        <input class="form-control"
               type="{{ $type }}"
               name="{{ $name }}"
               id = "{{ $name }}"
               value="{{ $value }}"
        >
        <x-form.error name="{{ $name }}"/>
    </div>
</div>
