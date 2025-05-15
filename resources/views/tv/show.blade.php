<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Now Showing: {{ $tv }}</title>
    @livewireStyles
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
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        video, img, embed {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    @livewire('tv-files', ['tv' => $tv])

    @livewireScripts

    <script>
        // Listen for 'unmute' message from parent window (modal iframe)
        window.addEventListener('message', (event) => {
            if (event.data === 'unmute') {
                const video = document.getElementById('video-player');
                if (video) {
                    video.muted = false;
                    video.play().catch(() => {
                        console.warn('Autoplay failed, possibly due to browser policy.');
                    });
                }
            }
        });
    </script>
</body>
</html>
