<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Now Showing: {{ $tvData->tv }}</title>
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
<body>
    <div class="content">
        @if($files->isEmpty())
            <h1>No files attached to this TV.</h1>
        @else
            @foreach ($files as $file)
                @if(Str::startsWith($file->filetype, 'video'))
                    <video src="{{ asset('storage/contents/' . $file->filename) }}" autoplay loop muted></video>
                @elseif(Str::startsWith($file->filetype, 'image'))
                    <img src="{{ asset('storage/contents/' . $file->filename) }}" alt="Image">
                @elseif(Str::startsWith($file->filetype, 'application/pdf'))
                    <embed src="{{ asset('storage/contents/' . $file->filename) }}" type="application/pdf">
                @else
                    <a href="{{ asset('storage/contents/' . $file->filename) }}" target="_blank">Download File</a>
                @endif
            @endforeach
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const el = document.documentElement;
            if (el.requestFullscreen) {
                el.requestFullscreen();
            }
        });
    </script>
    
    
</body>
</html>
