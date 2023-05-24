@props(['name'])
<div class="col-lg-12 mb-5">
    <div class="form-group">
        <label for="{{ $name }}">Your Message</label>
        <textarea class="form-control" name="{{ $name }}" id="message" cols="30" rows="6">
            {{ $slot ?? old($name) }}
        </textarea>
        <x-form.error name="{{ $name }}"/>
    </div>
</div>
