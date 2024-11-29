// Update file input label
$('.input-file').on('change', function() {
    const $input = $(this);
    const $label = $('.no_file_chosen');

    if ($input[0].files.length === 0) {
        $label.text('No file chosen');
    } else if ($input[0].files.length === 1) {
        $label.text('1 file selected');
    } else {
        $label.text($input[0].files.length + ' files selected');
    }
});

// Preview images show and remove
var $previewImagesContainer = $('#previewImagesContainer');
$previewImagesContainer.html('');

$('#photo').on('change', function() {
    var files = this.files;

    $.each(files, function(i, file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            cleanInputFile(e, false);
        };
        reader.readAsDataURL(file);
    });
});

var $mapUrl = $('#icon_url').length ? $('#icon_url') : $('#image_url');
if ($mapUrl.length) {
    $mapUrl.on('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                cleanInputFile(e, true);
                p
            };
            reader.readAsDataURL(file);
        }
    });
}

function cleanInputFile(e, isMapUrl) {
    if (isMapUrl) {
        $('#previewImagesContainerMap').html('');
    }

    var $previewContainer = $('<div>').css('position', 'relative');
    var $img = $('<img>', {
        src: e.target.result,
        alt: 'Preview Image',
        css: {
            maxWidth: '250px',
            maxHeight: '250px',
            paddingRight: '10px',
            paddingBottom: '15px'
        }
    });

    var $removeButton = $('<button>', {
        type: 'button',
        class: 'btn btn-sm btn-danger text-white fileDeleteBtns',
        html: '<i class="fa fa-times"></i>',
        css: {
            position: 'absolute',
            top: '5px',
            right: '15px'
        },
        'data-bs-toggle': 'modal',
        'data-bs-target': '#fileDeleteModal'
    });

    $removeButton.on('click', function() {
        if (isMapUrl) {
            $('#previewImagesContainerMap').empty();
            $('.input-file').val('');
            $('#icon_url').val('');
            $('#image_url').val('');
        } else {
            $previewImagesContainer.empty();
            updatePhotoInput();
        }
    });

    $previewContainer.append($img).append($removeButton);

    if (isMapUrl) {
        $('#previewImagesContainerMap').append($previewContainer);
    } else {
        $previewImagesContainer.append($previewContainer);
    }
}

function updatePhotoInput() {
    const $input = $('.input-file');

    var previewCount = $('#previewImagesContainer div').length;
    const $label = $('.no_file_chosen');

    if (previewCount === 0) {
        $input.val('');
        $label.text('No file chosen');
    } else if (previewCount === 1) {
        $label.text('1 file selected');
    } else {
        $label.text(previewCount + ' files selected');
    }
}
//     var input = document.querySelector('.input-file');

//     if (input) {
//         input.addEventListener('change', function() {
//             const label = document.querySelector('.no_file_chosen');

//             if (input.files.length === 0) {
//                 label.textContent = 'No file chosen';
//             } else if (input.files.length === 1) {
//                 label.textContent = input.files.length + ' file selected';
//             } else {
//                 label.textContent = input.files.length + ' files selected';
//             }
//         });

//         //Preview images show and remove
//         var previewImagesContainer = document.getElementById('previewImagesContainer');
//         if (previewImagesContainer) {
//             previewImagesContainer.innerHTML = '';
//         }

//         var photo = document.querySelector('.photo-file');

//         if (photo) {
//             photo.addEventListener('change', function () {
//                 var files = this.files;

//                 for (var i = 0; i < files.length; i++) {
//                     var reader = new FileReader();

//                     reader.onload = function (e) {
//                         cleanInputFile(e, false);
//                     };

//                     reader.readAsDataURL(files[i]);
//                 }
//             });
//         }
// document.getElementById('photo').addEventListener('change', function () {
//     var files = this.files;

//     for (var i = 0; i < files.length; i++) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             cleanInputFile(e, false);
//         };

//         reader.readAsDataURL(files[i]);
//     }
// });

//         var mapUrl = document.getElementById('map_url') !== null ? document.getElementById('map_url') : document.getElementById('icon_url');

//         if (mapUrl != null) {
//             mapUrl.addEventListener('change', function(event) {
//                 const file = event.target.files[0];
//                 if (file) {
//                     const reader = new FileReader();
//                     reader.onload = function(e) {
//                         cleanInputFile(e, true);
//                     }
//                     reader.readAsDataURL(file);
//                 }
//             });
//         }

//         function cleanInputFile(e, mapUrl) {
//             if(mapUrl) {
//                 var previewImagesContainerMap = document.getElementById('previewImagesContainerMap');
//                 previewImagesContainerMap.innerHTML = '';
//             }
//             var previewContainer = document.createElement('div');
//             previewContainer.style.position = 'relative';
//             // Create the preview image
//             var img = document.createElement('img');
//             img.src = e.target.result;
//             img.alt = 'Preview Image';
//             img.style.maxWidth = '250px';
//             img.style.maxHeight = '250px';
//             img.style.paddingRight = '10px';
//             img.style.paddingBottom = '15px';

//             // Create the remove button
//             var removeButton = document.createElement('button');
//             removeButton.setAttribute('type', 'button');
//             removeButton.setAttribute('data-id', '123');
//             removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'text-white', 'fileDeleteBtns');
//             removeButton.setAttribute('data-bs-toggle', 'modal');
//             removeButton.setAttribute('data-bs-target', '#fileDeleteModal');
//             removeButton.innerHTML = '<i class="fa-solid fa-circle-xmark"></i>';

//             removeButton.style.position = 'absolute';
//             removeButton.style.top = '5px';
//             removeButton.style.right = '15px';

//             removeButton.addEventListener('click', function () {
//                 if(mapUrl) {
//                     previewImagesContainerMap.removeChild(previewContainer);
//                 } else {
//                     previewImagesContainer.removeChild(previewContainer);
//                 }
//                 if(mapUrl) {
//                     const fileInput = document.getElementById('map_url') !== null ? document.getElementById('map_url') : document.getElementById('icon_url');
//                     fileInput.value = '';
//                 } else {
//                     updatePhotoInput();
//                 }
//             });

//             previewContainer.appendChild(img);
//             previewContainer.appendChild(removeButton);

//             if(mapUrl) {
//                 previewImagesContainerMap.appendChild(previewContainer);
//             } else {
//                 previewImagesContainer.appendChild(previewContainer);
//             }
//         }

//         function updatePhotoInput() {
//             const input = document.querySelector('.input-file');
//             var previewContainers = document.querySelectorAll('#previewImagesContainer div');
//             const label = document.querySelector('.no_file_chosen');

//             if (previewContainers.length === 0) {
//                 // No previews, reset the input
//                 input.value = null;
//                 label.textContent = 'No file chosen';
//             } else if (previewContainers.length === 1) {
//                 label.textContent = '1 file selected';
//             } else {
//                 label.textContent = previewContainers.length + ' files selected';
//             }
//         }



//     }
// });