$('#photo').change(function() {
    const files = this.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const newPreview = `
                <div class="col-4 col-md-3 newPreview">
                    <div style="width: 100%;" class="d-flex flex-column align-items-center justify-content-center text-truncate mt-3">
                        <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 150px;">
                            <img src="${e.target.result}" style="max-width: 100%; max-height: 100%;" alt="${file.name}">
                        </div>
                        <h4 class="mt-2 text-secondary fs-6"></h4>
                        <button type="button" data-id="new-${i}" class="btn btn-sm btn-danger text-white fileDeleteBtns"><i class="fa-solid fa-circle-xmark"></i></button>
                    </div>
                </div>
            `;

            $('#previewImagesContainer').append(newPreview);

            // Attach delete functionality to the newly added delete button
            $(`.fileDeleteBtns[data-id="new-${i}"]`).click(function() {
                $(this).closest('.col-4').remove();
            });
        };

        reader.readAsDataURL(file);
    }
});