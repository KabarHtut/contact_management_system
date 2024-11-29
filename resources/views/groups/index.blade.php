<x-layouts.admin>
    <div class="container">
        <a href="{{ route('group.create') }}" class="btn btn-primary">Add Group</a>
        <div class="row mt-4">
            @foreach ($groups as $group)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $group->image }}" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="text-center">{{ $group->group_name }}</h3>
                            <div class="d-flex">
                                <div class="me-3">
                                    <a href="{{ route('group.show', $group->id) }}" class="btn btn-primary mt-1">Show</a>
                                    <button type="button" data-id="{{ $group->id }}"
                                        class="btn btn-danger deleteBtns mt-1"
                                        data-toggle="modal" data-target="#groupModal">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $groups->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="groupDeleteForm" class="modal-content" method="POST">
                @csrf
                @method('Delete')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="groupModalLabel">Are You Sure?</h1>
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

    <x-slot name='script'>
        <script>
            $(document).ready(function() {
                $('.deleteBtns').click(function() {
                    let id = $(this).data('id');
                    let actionUrl = "{{ route('group.destroy', ':id') }}".replace(':id', id);
                    $('#groupDeleteForm').attr('action', actionUrl);
                });
            });
        </script>
    </x-slot>
</x-layouts.admin>
