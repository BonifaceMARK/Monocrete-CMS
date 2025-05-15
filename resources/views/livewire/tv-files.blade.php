<div wire:poll.1s class="content" x-data>
    @if($files->isEmpty())
        <h1>No files attached to this TV.</h1>
    @else
        @foreach ($files as $file)
            @if(Str::startsWith($file->filetype, 'video'))
                <video
                    id="video-player"
                    src="{{ asset('storage/contents/' . $file->filename) }}"
                    autoplay
                    loop
                    muted
                    playsinline
                    style="width: 100%; height: auto;"
                ></video>
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

{{-- Script for handling the unmute logic --}}
<script>
    document.addEventListener('livewire:load', function () {
        // Dispatch event when fileUploaded is received
        Livewire.on('fileUploaded', () => {
            const video = document.getElementById('video-player');
            if (video) {
                video.muted = false;
                video.play();
            }
        });
    });
</script>

{{-- Trigger the Livewire event if session has flag --}}
@if (session('dispatchEvent'))
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.dispatch('fileUploaded');
        });
    </script>
@endif
