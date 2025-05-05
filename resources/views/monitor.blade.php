@include('layout.title')

<div class="container-fluid">
    <div class="row">
        @forelse ($files as $file)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        TV: {{ $file->tv }} | File: {{ $file->filename }}
                    </div>
                    <div class="card-body text-center">
                        @if(Str::startsWith($file->filetype, 'video'))
                            <video controls autoplay loop muted class="w-100">
                                <source src="{{ asset('storage/contents/' . $file->filename) }}" type="{{ $file->filetype }}">
                                Your browser does not support the video tag.
                            </video>
                        @elseif(Str::startsWith($file->filetype, 'image'))
                            <img src="{{ asset('storage/contents/' . $file->filename) }}" alt="Image" class="img-fluid">
                        @elseif(Str::startsWith($file->filetype, 'application/pdf'))
                            <embed src="{{ asset('storage/contents/' . $file->filename) }}" type="application/pdf" width="100%" height="200">
                        @else
                            <a href="{{ asset('storage/contents/' . $file->filename) }}" target="_blank" class="btn btn-primary">Download File</a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No files uploaded from any TV.</p>
        @endforelse
    </div>
</div>

@include('layout.footer')