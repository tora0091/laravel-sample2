<!-- adminlte::pageを継承 -->
@extends('adminlte::page')

<!-- ページタイトルを入力 -->
@section('title', 'Dashboard')

<!-- ページの見出しを入力 -->
@section('content_header')
    <h1>Dashboard</h1>
@stop

<!-- ページの内容を入力 -->
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <input type="file" id="file_upload" name="file_upload">
    <div id="image_area"></div>
@stop

<!-- 読み込ませるCSSを入力 -->
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

<!-- 読み込ませるJSを入力 -->
@section('js')
    <script>
    $('#file_upload').on('change', function() {
        upload_file = $(this).prop('files')[0];
        // if (! upload_file.type.match('image/*')) {
            var form = new FormData();
            form.append('upload_file', upload_file);

            $.ajax({
                url: 'file_upload',
                type: 'POST',
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function (data) {
                var json_objct = JSON.stringify(data);
                var json_data = JSON.parse(json_objct);
                var image_file_name = json_data['file_name'];

                $('#image_file').remove();
                $('#image_area').append('<image id="image_file" src="images/' + image_file_name + '">');
            }).fail(function(error) {
                console.log(error);
            });
        // }
    });
    </script>
@stop