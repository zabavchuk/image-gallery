require('./bootstrap');

import { FineUploader } from 'fine-uploader';

function handleUpload(id, name) {
    const data = {
        title: $('.qq-file-id-' + id).find('input[name="title[]"]').val(),
        tag: $('.qq-file-id-' + id).find('input[name="tag[]"]').val()
    };

    galleryUploader.setParams(data, id);
}

function handleComplete(event, id, fileName, response) {
    if(JSON.parse(response.response).success){

        setTimeout(function () {
            $('li.qq-upload-success').remove();
        }, 1000);
    }
}

function uploadImage(e) {
    e.preventDefault();
    galleryUploader.uploadStoredFiles();
}
function removeComma() {
    $(this).val($(this).val().replace(/,/g, ' #'));
}

const galleryUploader = new FineUploader({
    element: document.getElementById('fine-uploader-gallery'),
    template: 'qq-template-gallery',
    request: {
        endpoint: '/upload_image',
        customHeaders: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    multiple: true,
    autoUpload: false,
    validation: {
        allowedExtensions: ['jpeg', 'jpg', 'gif', 'png'],
        sizeLimit: 15000000,
    },
    callbacks: {
        onUpload: handleUpload,
        onComplete: handleComplete
    }
});

$(function () {
    $(document).on('keyup', '.image-tag', removeComma);
    $(document).on('submit', '.upload_image', uploadImage);
});