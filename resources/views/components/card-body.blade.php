@props(['contact'])
<div class="card-body">
    <p class="fs-6">Name - {{ $contact->name }}</p>
    <p class="fs-6">Phone - {{ $contact->phone }}</p>
    <p class="fs-6">Email - {{ $contact->email }}</p>
    <p class="fs-6">Group - {{ $contact->group->group_name }}</p>
    <p class="fs-6">Address - {{ $contact->address }}</p>
    <p class="fs-6">Birthday - {{ $contact->birthday }}</p>
    <p class="fs-6">Facebook Link - <a href="{{ $contact->facebook }}">{{ $contact->facebook }}</a></p>
    <div class="d-flex">
        <div class="me-3">
            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary mb-1">Edit</a>
            <button type="button" data-id="{{ $contact->id }}"
                class="btn btn-danger deleteBtns mb-1"
                data-toggle="modal" data-target="#contactModal">
                Delete
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="contactDeleteForm" class="modal-content" method="POST">
                @csrf
                @method('Delete')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="contactModalLabel">Are You Sure?</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure To Delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" id="changeDelete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-slot name='script'>
    <script>
        $(document).ready(function() {
            $('.deleteBtns').click(function() {
                let id = $(this).data('id');
                let actionUrl = "{{ route('contact.destroy', ':id') }}".replace(':id', id);
                $('#contactDeleteForm').attr('action', actionUrl);
            });
        });
    </script>
</x-slot>
