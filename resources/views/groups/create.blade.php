<x-layouts.admin>
    <x-card-wapper>
        <form action="{{ route('group.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input-wapper>
                <x-form.input name="group_name" for="group_name" label="Group Name" placeholder="Please Enter Group Name..." />
                <x-form.file-upload name="image" type="file" for="image" for="image_url" label="Image" preview required />
                <div class="preview">
                    <div id="previewImagesContainerMap" class="mt-2" style="display: flex; flex-wrap: wrap;"></div>
                </div>
            </x-form.input-wapper>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </x-card-wapper>

    <x-slot name='script'>
        <script src="{{ asset('js/preview_show_remove_in_create.js') }}" defer></script>
    </x-slot>
</x-layouts.admin>
