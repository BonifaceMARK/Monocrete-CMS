<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TV Display</title>
    @livewireStyles
    <title>Now Showing: {{ $tv }}</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background: black;
            color: white;
            overflow: hidden;
        }
        .content {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        video, img, embed {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body style="margin:0; padding:0; background:black; color:white; overflow:hidden;">
     @livewire('tv-files', ['tv' => $tv]) 

    @livewireScripts
</body>
</html>
