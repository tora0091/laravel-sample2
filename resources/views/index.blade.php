@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sample List</h1>
@stop

@section('content')
    <p>画像(jpeg/jpg/png) アップロード</p>
    <input type="file" id="file_upload" name="file_upload">
    <div id="image_area"></div>

    <hr>
    <p>モーダルウインドウ</p>
    <button type="button" data-toggle="modal" data-target="#modal-sample">選択</button>
    <div id="selected_player_area"></div>

    <hr>
    <p>地域都道府県選択</p>
    <button type="button" data-toggle="modal" data-target="#modal-area-select">地域選択</button>
    <div id="selected_prefecture_area"></div>

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

    <div class="modal" id="modal-area-select" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <div id="area_parts">
                        <label id="text_hokkaido">北海道</label><p id="msg_hokkaido" style="display:none">選択中</p><br>
                        <label id="text_tohoku">東北</label><p id="msg_tohoku" style="display:none">選択中</p><br>
                        <label id="text_kanto">関東</label><p id="msg_kanto" style="display:none">選択中</p><br>
                        <label id="text_chubu">中部</label><p id="msg_chubu" style="display:none">選択中</p><br>
                        <label id="text_kinki">近畿</label><p id="msg_kinki" style="display:none">選択中</p><br>
                        <label id="text_chugoku">中国</label><p id="msg_chugoku" style="display:none">選択中</p><br>
                        <label id="text_shikoku">四国</label><p id="msg_shikoku" style="display:none">選択中</p><br>
                        <label id="text_kyushu">九州沖縄</label><p id="msg_kyushu" style="display:none">選択中</p><br>
                    </div>

                    <hr>
                    <div id="prefecture_parts">
                        <div id="hokkaido_list" style="display:none">
                            <input type="checkbox" id="area_hokkaido"><label for="area_hokkaido">北海道</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_hokkaido" data-parent="area_hokkaido" name="prefecture[]" value="1"><label>北海道</label><br>
                        </div>

                        <div id="tohoku_list" style="display:none">
                            <input type="checkbox" id="area_tohoku"><label for="area_tohoku">東北</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_tohoku" data-parent="area_tohoku" name="prefecture[]" value="2"><label>青森県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_tohoku" data-parent="area_tohoku" name="prefecture[]" value="3"><label>岩手県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_tohoku" data-parent="area_tohoku" name="prefecture[]" value="4"><label>秋田県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_tohoku" data-parent="area_tohoku" name="prefecture[]" value="5"><label>宮城県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_tohoku" data-parent="area_tohoku" name="prefecture[]" value="6"><label>山形県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_tohoku" data-parent="area_tohoku" name="prefecture[]" value="7"><label>福島県</label><br>
                        </div>

                        <div id="kanto_list" style="display:none">
                            <input type="checkbox" id="area_kanto"><label for="area_kanto">関東</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kanto" data-parent="area_kanto" name="prefecture[]" value="8"><label>茨城県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kanto" data-parent="area_kanto" name="prefecture[]" value="9"><label>栃木県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kanto" data-parent="area_kanto" name="prefecture[]" value="10"><label>群馬県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kanto" data-parent="area_kanto" name="prefecture[]" value="11"><label>埼玉県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kanto" data-parent="area_kanto" name="prefecture[]" value="12"><label>千葉県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kanto" data-parent="area_kanto" name="prefecture[]" value="13"><label>東京県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kanto" data-parent="area_kanto" name="prefecture[]" value="14"><label>神奈川県</label><br>
                        </div>

                        <div id="chubu_list" style="display:none">
                            <input type="checkbox" id="area_chubu"><label for="area_chubu">中部</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="15"><label>新潟県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="16"><label>富山県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="17"><label>石川県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="18"><label>福井県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="19"><label>山梨県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="20"><label>長野県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="21"><label>岐阜県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="22"><label>静岡県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chubu" data-parent="area_chubu" name="prefecture[]" value="23"><label>愛知県</label><br>
                        </div>

                        <div id="kinki_list" style="display:none">
                            <input type="checkbox" id="area_kinki"><label for="area_kinki">近畿</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kinki" data-parent="area_kinki" name="prefecture[]" value="24"><label>三重県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kinki" data-parent="area_kinki" name="prefecture[]" value="25"><label>滋賀県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kinki" data-parent="area_kinki" name="prefecture[]" value="26"><label>京都府</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kinki" data-parent="area_kinki" name="prefecture[]" value="27"><label>大阪府</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kinki" data-parent="area_kinki" name="prefecture[]" value="28"><label>兵庫県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kinki" data-parent="area_kinki" name="prefecture[]" value="29"><label>奈良県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kinki" data-parent="area_kinki" name="prefecture[]" value="30"><label>和歌山県</label><br>
                        </div>

                        <div id="chugoku_list" style="display:none">
                            <input type="checkbox" id="area_chugoku"><label for="area_chugoku">中国</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chugoku" data-parent="area_chugoku" name="prefecture[]" value="31"><label>鳥取県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chugoku" data-parent="area_chugoku" name="prefecture[]" value="32"><label>島根県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chugoku" data-parent="area_chugoku" name="prefecture[]" value="33"><label>岡山県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chugoku" data-parent="area_chugoku" name="prefecture[]" value="34"><label>広島県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_chugoku" data-parent="area_chugoku" name="prefecture[]" value="35"><label>山口県</label><br>
                        </div>

                        <div id="shikoku_list" style="display:none">
                            <input type="checkbox" id="area_shikoku"><label for="area_shikoku">四国</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_shikoku" data-parent="area_shikoku" name="prefecture[]" value="36"><label>徳島県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_shikoku" data-parent="area_shikoku" name="prefecture[]" value="37"><label>香川県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_shikoku" data-parent="area_shikoku" name="prefecture[]" value="38"><label>愛媛県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_shikoku" data-parent="area_shikoku" name="prefecture[]" value="39"><label>高知県</label><br>
                        </div>

                        <div id="kyushu_list" style="display:none">
                            <input type="checkbox" id="area_kyushu"><label for="area_kyushu">九州沖縄</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="40"><label>福岡県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="41"><label>佐賀県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="42"><label>長崎県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="43"><label>熊本県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="44"><label>大分県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="45"><label>宮崎県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="46"><label>鹿児島県</label><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pref_kyushu" data-parent="area_kyushu" name="prefecture[]" value="47"><label>沖縄県</label><br>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal_area_select_button" data-dismiss="modal">Send</button>
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
    // image upload.
    $('#file_upload').on('change', function() {
        upload_file = $(this).prop('files')[0];
        // if (! upload_file.type.match('image/*')) {
            let form = new FormData();
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

    // modal window.
    $('#select_team').on('change', function() {
        selected_number = $(this).val();

        $.ajax({
            url: 'favorite_player',
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

    // 都道府県チェックボックスリストを隠す
    let allListHide = function() {
        $('#hokkaido_list').hide()
        $('#tohoku_list').hide();
        $('#kanto_list').hide();
        $('#chubu_list').hide();
        $('#kinki_list').hide();
        $('#chugoku_list').hide();
        $('#shikoku_list').hide();
        $('#kyushu_list').hide();
    }

    // 地域テキストの左部にメッセージを表示する
    let changeAreaTextMessage = function(area) {
        child_id = `pref_${area}`
        checked_count = 0
        $(`input[id=${child_id}]:checked`).each(function() {
            checked_count++
        })
        if (checked_count === 0) {
            $(`#msg_${area}`).hide()
        } else {
            $(`#msg_${area}`).show()
        }
    }

    // 地域テキストをクリックした際の処理
    $('label[id^=text_]').on('click', function() {
        allListHide()
        area = $(this).prop('id').replace('text_', '')
        $(`#${area}_list`).show()
    })

    // 地域チェックボックスをクリックした際の処理：子どもの都道府県を連動させる
    $('input[id^=area_]').on('click', function() {
        id = $(this).prop('id')
        checked = $(this).prop('checked')
        $(`input[data-parent="${id}"]`).each(function() {
            $(this).prop('checked', checked)
        })
        changeAreaTextMessage(id.replace('area_', ''))
    })

    // 都道府県チェックボックスをクリックした際の処理：親の地域を連動させる
    $('input[id^=pref_]').on('click', function() {
        area = $(this).prop('id').replace('pref_', '')
        parent_id = "area_" + area

        child_count = 0
        child_checked_count = 0
        $(`input[data-parent="${parent_id}"]`).each(function() {
            child_count++
            if ($(this).prop('checked')) {
                child_checked_count++
            }
        })

        if (child_count === child_checked_count) {
            $(`input[id=${parent_id}]`).prop('checked', true)
        } else {
            $(`input[id=${parent_id}]`).prop('checked', false)
        }
        changeAreaTextMessage(area)
    })

    $('#modal_area_select_button').on('click', function() {
        checked_prefectures = []
        $('input[id^=pref]:checked').each(function() {
            checked_prefectures.push($(this).val())
        })
        checked_prefectures_text = checked_prefectures.join(',')

        $('#selected_prefecture_area').empty();
        $('#selected_prefecture_area').append(checked_prefectures_text);
    })
    </script>
@stop