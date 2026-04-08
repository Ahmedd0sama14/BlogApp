@props(['name', 'rows' => 5])

<textarea
    name="{{ $name }}"
    rows="{{ $rows }}"
    placeholder="Enter Message"
    {{ $attributes->merge([
        'class' => 'form-control text-dark w-100 ' . ($errors->has($name) ? 'is-invalid' : '')
    ]) }}
>{{ old($name) }}</textarea>
