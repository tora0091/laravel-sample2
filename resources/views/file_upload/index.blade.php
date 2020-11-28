@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>画像(jpeg/jpg/png) アップロード</h1>
@stop

@section('content')
    <input type="file" id="file_upload" name="file_upload">
    <div id="image_area"></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    // image upload.
    $('#file_upload').on('change', function() {
        upload_file = $(this).prop('files')[0];
        // if (! upload_file.type.match('image/*')) {
            let form = new FormData();
            form.append('upload_file', upload_file);

            $.ajax({
                url: 'api/file_upload',
                type: 'POST',
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done((data) => {
                let json_objct = JSON.stringify(data);
                let json_data = JSON.parse(json_objct);
                let image_file_name = json_data['file_name'];

                $('#image_area').empty();
                $('#image_area').append(`<image id="image_file" src="images/${image_file_name}">
                    <input type="hidden" name="image_file_name" value="${image_file_name}">`);
            }).fail((error) => {
                console.log(error);
            });
        // }
    });
    </script>
@stop