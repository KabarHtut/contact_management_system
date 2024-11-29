@props([
    'name',
    'value' => '',
    'placeholder' => $placeholder ?? ucfirst($name),
    'for',
    'label',
    'disabled' => false,
    'readonly' => false,
    'required' => false,
    'valueField',
    'nameField',
    'options' => [],
    'style' => '',
    'class' => ''
])

@php
    $value = old($name) ? old($name) : $value ;
@endphp

<div class="input-group has-validation mb-3" style="width: 100%">
    <div class="is-invalid" style="width: 100%">
        <label for="{{$for}}" class="mb-2">{{$label}} {!! $required ? '<span class="text-danger">*</span>' : '' !!}</label>
        <select 
            name="{{$name}}" 
            id="{{$for}}" 
            class="form-control {{$errors->has($name) ? 'is-invalid' : ''}} {{$class}}" 
            {{$disabled ? 'disabled' : '' }}
            {{$readonly ? 'readonly' : '' }}
            {{$required ? 'required' : '' }}
            style="{{$style}}"
        >
            <option value="" disabled {{$value ? "" : 'selected' }}>Select</option>
            @foreach ($options as $option)
                <option {{$value == $option[$valueField] ? 'selected' : "" }} value="{{$option[$valueField]}}">{{$option[$nameField]}}</option>
            @endforeach

        </select>   
    </div>

    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>