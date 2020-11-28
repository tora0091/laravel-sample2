<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        @font-face {
            font-family: ipag;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/ipag.ttf') }}') format('truetype');
        }
        @font-face {
            font-family: ipag;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/ipag.ttf') }}') format('truetype');
        }
        body {
            font-family: ipag !important;
        }
    </style>
</head>
<body>
{{ $name }} 様<br>
おはようございます、先日はありがとうございました。今日は良い一日ですね。<br>
さて、例の件ですが問題なく進んでおります。<br>
<br>
あと数日のうちに、完了する手はずです。<br>
<br>
{{ $day}}
</body>
</html>