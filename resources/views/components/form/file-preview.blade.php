@props([
    'url',
    'canDelete' => false
])

<div class="row mb-2 previews-container">
    <div class="col-md-2"></div>
    <div class="col-4 col-md-4">
        <div style="width: 100%;" class="d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex" style="width: 100%; height: 200px;">
                <img src="{{$url}}" style="max-width: 200px;max-height: 200px; object-fit:cover" alt="">
            </div>
        @if ($canDelete)
        <button class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></button>
        @endif
        </div>
    </div>
</div>
<style>
    .previews-container {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .previews-container img {
        width: 150px;
        height: 150px;
        margin: 5px;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .hidden {
            display: none;
        }
</style>
