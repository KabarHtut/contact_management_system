@props([
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => "",
    'for',
    'label',
    'disabled' => false,
    'readonly' => false,
    'required' => false,
    'style' => '',
    'class' => '',
    'multiple' => false
])

@php
    $value = old($name) ? old($name) : $value ;
@endphp

<div class="input-group has-validation mb-3" style="width: 100%">
    <div class="is-invalid" style="width: 100%">
        <label for="{{$for}}" class="mb-2">{{$label}} {!! $required ? '<span class="text-danger">*</span>' : '' !!}</label>
        <input
            id="{{$for}}"
            type="{{ $type }}"
            name="{{$name}}"
            value="{{$value}}"
            class="form-control {{$errors->has($name) ? 'is-invalid' : ''}} {{$class}}"
            placeholder="{{$placeholder}}"
            {{$disabled ? 'disabled' : '' }}
            {{$readonly ? 'readonly' : '' }}
            {{$required ? 'required' : '' }}
            {{$multiple ? 'multiple' : '' }}
            style="{{$style}}"
        />
    </div>

    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>
