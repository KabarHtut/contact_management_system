@props(['name'])
<div class="card">
    <div class="card-header text-center">{{ $name }}</div>

    <div class="card-body">
        {{ $slot }}
    </div>
</div>
