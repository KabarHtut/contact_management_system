<x-layouts.admin>
    <div class="container">
        <form class="form-inline" method="POST" enctype="multipart/form-data" action="{{ route('contact.search') }}">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2" name="keyword" value="{{ old('keyword') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="row mt-4">
            @foreach ($contacts as $contact)
                <div class="col-md-4 mb-4">
                    <x-card :contact="$contact" />
                </div>
            @endforeach
            {{ $contacts->links() }}
        </div>
    </div>

    <x-slot name='script'>

    </x-slot>
</x-layouts.admin>
