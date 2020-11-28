@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>モーダルウィンドウ</h1>
@stop

@section('content')
    <button type="button" data-toggle="modal" data-target="#modal-sample">選択</button>
    <div id="selected_player_area"></div>

    <div class="modal" id="modal-sample" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <p>select your favorite team</p>
                    <select id="select_team" name="select_team">
                        <option value=1>Boston Celtics</option>
                        <option value=2>New York Knicks</option>
                        <option value=3>Philadelphia 76ers</option>
                        <option value=4>Los Angeles Lakers</option>
                        <option value=5>Golden State Warriors</option>
                    </select>

                    <div id="select_area" name="select_area"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="send_button" data-dismiss="modal">Send</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    // modal window.
    $('#select_team').on('change', function() {
        selected_number = $(this).val();

        $.ajax({
            url: 'api/favorite_player',
            type: 'POST',
            data: {
                'selected_number': selected_number,
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done((data) => {
            let json_objct = JSON.stringify(data);
            let json_data = JSON.parse(json_objct);

            let html_tag = '<div id="select_list">';
            $.each(json_data, function(index, name) {
                html_tag += `<label><input type="radio" name="player_id" id="player_id" value="${index}">${name}</label><br>`;
            })
            html_tag += '</div>';

            $('#select_area').empty();
            $('#select_area').append(html_tag);
        }).fail((error) => {
            console.log(error);
        });
    });

    $('#send_button').on('click', function() {
        let checked = $('input[id="player_id"]:checked');
        let player_id = checked.val();
        let player_name = checked.parent().text();

        let html_tag = `<p>${player_id}: ${player_name}</p>
            <input type="hidden" name="player_id" value="${player_id}">
            <input type="hidden" name="player_name" value="${player_name}">`;

        $('#selected_player_area').empty();
        $('#selected_player_area').append(html_tag);
    });
    </script>
@stop