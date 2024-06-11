<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
</head>
<body class="font-sans antialiased">
<div style="text-align: center;margin-top: 100px">
    <form  method="post" action="/import-xml" enctype="multipart/form-data">
        @csrf
        <input type="file" name="xml">
        @error('xml')
        <div style="color: #FF2D20" class="error">{{ $message }}</div>
        @enderror
        <button style="background-color: #9ca3af;border: 2px" type="submit">Import XML</button>
    </form>
    @if(session('message'))
        <div class="alert alert-success">
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        </div>
    @endif
    <a methods="post" href="{{route('export.excel')}}">
        Download
    </a>
</div>

</body>
</html>
