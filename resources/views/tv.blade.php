<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
</head>
<body>
    <div wire:poll.5s class="content" >
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
