<x-layouts.admin>
    <x-card-wapper>
        <h3 class="text-center">CMS</h3>
        <div class="mt-4">
            <a href="{{ route('contact.index') }}">
                <p class="text-center text-dark">Detail Contact - ({{ $count = App\Models\Contact::get()->count() }})
                </p>
            </a>
        </div>
        <div class="mt-4">
            <a href="{{ route('group.index') }}">
                <p class="text-center text-dark">Group Contact - ({{ $count = App\Models\Group::get()->count() }})
                </p>
            </a>
        </div>
    </x-card-wapper>

    <x-slot name='script'>

    </x-slot>
</x-layouts.admin>
