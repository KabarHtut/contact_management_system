@props([
    'name',
    'rows' => '',
    'cols' => '',
    'value' => '',
    'placeholder' => $placeholder ?? ucfirst($name),
    'for',
    'label',
    'disabled' => false,
    'readonly' => false,
    'required' => false,
    'style' => '',
    'class' => ''
])

<div class="input-group has-validation mb-3" style="width: 100%">
    <div class="is-invalid" style="width: 100%">
        <label for="{{$for}}" class="mb-2">{{$label}} {!! $required ? '<span class="text-danger">*</span>' : '' !!}</label>
        <textarea
            id="{{$for}}"
            name="{{$name}}"
            cols="{{$cols}}"
            rows="{{$rows}}"
            class="form-control {{$errors->has($name) ? 'is-invalid' : ''}} {{$class}}"
            placeholder="{{$placeholder}}"
            {{$disabled ? 'disabled' : '' }}
            {{$readonly ? 'readonly' : '' }}
            {{$required ? 'required' : '' }}
            style="{{$style}}"
        >{{ old($name) ? old($name) : $value }}</textarea>
    </div>

    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>
