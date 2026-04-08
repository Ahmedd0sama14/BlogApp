@props([
    'name' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
])

<input
 class="form-control text-dark "
name="{{ $name }}"
type="{{ $type }}"
placeholder="{{ $placeholder }}"
value="{{ old($name) }}"
{{
 $attributes->class([
    'is-invalid' => $errors->has($name)
    ])
}}>

