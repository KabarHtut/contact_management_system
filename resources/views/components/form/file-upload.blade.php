@props([
    'name',
    'type' => 'file',
    'value' => old($name) ?? '',
    'placeholder' => $placeholder ?? ucfirst($name),
    'for',
    'label',
    'disabled' => false,
    'readonly' => false,
    'required' => false,
    'style' => '',
    'class' => '',
    'multiple' => false,
    'preview' => false

])
<div class="input-group" style="width: 100%;">
    <div class="file-input" style="width: 100%;">
        <label for="{{$for}}" class="mb-2">{{$label}} {!! $required ? '<span class="text-danger">*</span>' : '' !!}</label>
        <input
            id="{{$for}}"
            type="{{ $type }}"
            name="{{$name}}"
            value="{{$value}}"
            class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }} {{$class}} {{$preview ? '' : 'input-file' }}"
            placeholder="{{$placeholder}}"
            {{$disabled ? 'disabled' : '' }}
            {{$readonly ? 'readonly' : '' }}
            {{$required ? 'required' : '' }}
            {{$multiple ? 'multiple' : ''}}
            style="{{$style}}"
        />

        @if (!$preview)
            <div class="row file-label">
                <div class="col-4 choose_file h-100">
                    <span>Choose files</span>
                </div>
                <div class="col-8 no_file_chosen">
                    <span>No file chosen</span>
                </div>
            </div>
        @endif

        @error($name)
            <div class="invalid-feedback d-block">
                {{$message}}
            </div>
        @enderror
    </div>
</div>
