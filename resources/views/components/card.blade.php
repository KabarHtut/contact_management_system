@props(['contact'])
<div class="card" style="width: 18rem;">
    @if (isset($contact->image))
        <img class="card-img-top" src="{{ $contact->image }}" alt="Card image cap">
    @endif
    <x-card-body :contact="$contact" />
</div>
