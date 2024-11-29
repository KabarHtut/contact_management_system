@props(['name', 'type' => 'text', 'value' => ''])
<x-user.input-wapper>
    <x-user.label :name="$name" />
    <input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
        value="{{ old($name, $value) }}" id="{{ $name }}" aria-describedby="emailHelp">
    <x-error :name="$name" />
</x-user.input-wapper>
