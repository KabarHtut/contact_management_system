<x-layouts.admin>
    <x-card-wapper>
        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input-wapper>
                <div class="form-group col-md-4">
                    <x-form.input name="name" for="name" label="Name" placeholder="Please Enter Name..." required />
                </div>
                <div class="form-group col-md-4">
                    <x-form.input name="email" type="email" for="email" label="Email" placeholder="Please Enter Email..." required />
                </div>
                <div class="form-group col-md-4">
                    <x-form.input name="phone" for="phone" label="Phone" placeholder="Please Enter Phone..." required />
                </div>
            </x-form.input-wapper>
            <x-form.input-wapper>
                <div class="form-group col-md-4">
                    <x-form.input name="facebook" for="facebook" label="Facebook Link" placeholder="Please Enter Facebook Link..." placeholder="Please Enter Name..." required />
                </div>
                <div class="form-group col-md-4">
                    <x-form.input name="birthday" type="date" for="birthday" label="Birthday" required />
                </div>
                <div class="form-group col-md-4">
                    <x-form.select for="group_id" name="group_id" label="Group Contact"
                        valueField="id" nameField="group_name" :options="$groups" required />
                </div>
            </x-form.input-wapper>
            <x-form.input-wapper>
                <div class="form-group col-md-6">
                    <x-form.textarea name="address" for="address" label="Address" rows='7'
                    cols='20' placeholder="Please Enter Address..." required />
                </div>
                <div class="form-group col-md-6">
                    <x-form.file-upload name="image" type="file" for="image" for="image_url" label="Image" preview required />
                    <div class="preview">
                        <div id="previewImagesContainerMap" class="mt-2" style="display: flex; flex-wrap: wrap;"></div>
                    </div>
                </div>

            </x-form.input-wapper>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </x-card-wapper>

    <x-slot name='script'>
        <script src="{{ asset('js/preview_show_remove_in_create.js') }}" defer></script>
    </x-slot>
</x-layouts.admin>
