<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $design->full_name() }} - Haweb.vn</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: auto !important;
            max-width: 100% !important;
            max-height: auto;
        }
    </style>
</head>

<body>
    <a href="javascript::void(0)">
        <img src="{{ asset('/uploads/designs/' . $design->photo) }}" alt="{{ $design->full_name() }}">
    </a>
</body>

</html>
