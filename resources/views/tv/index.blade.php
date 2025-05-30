@include('layout.title')
<main class="container-fluid">
<div>
    <button type="button" style="font-size:10px;" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createTvModal">
        <i class="bi bi-tv"></i> Add Smart TV
    </button>
    <table style="font-size: 10px; width: 100%; border-collapse: collapse;" class="table table-bordered">
        <thead>
            <tr>
                {{-- <th style="padding: 8px; text-align: left;">#</th> --}}
                <th style="padding: 8px; text-align: left;">ID</th>
                <th style="padding: 8px; text-align: left;">TV</th>
                <th style="padding: 8px; text-align: left;">Location</th>
                <th style="padding: 8px; text-align: left;">Department</th>
                {{-- <th style="padding: 8px; text-align: left;">Brand</th> --}}
                {{-- 
                <th style="padding: 8px; text-align: left;">Description</th>

                <th style="padding: 8px; text-align: left;">Filename</th>
                <th style="padding: 8px; text-align: left;">Filesize.(KB)</th>
                <th style="padding: 8px; text-align: left;">Filetype</th> --}}
                <th style="padding: 8px; text-align: left;">Created At</th>
                {{-- <th style="padding: 8px; text-align: left;">Updated At</th> --}}
                <th style="padding: 8px; text-align: left;">URL</th>
                {{-- <th style="padding: 8px; text-align: left;">Remarks</th> --}}
                <th style="padding: 8px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tvs as $tv)
                <tr>
                    {{-- <td style="padding: 8px;">{{ $tvs->recid }}</td> --}}
                    <td style="padding: 8px;">{{ $tv->tv_id }}</td>
                    <td style="padding: 8px;">{{ $tv->tv }}</td>
                    <td style="padding: 8px;">{{ $tv->location }}</td>
                    <td style="padding: 8px;">{{ $tv->department }}</td>
                    {{-- <td style="padding: 8px;">{{ $tv->brand }}</td> --}}
                    {{-- <td style="padding: 8px;">{{ $tvs->location }}</td> --}}
                    {{-- <td style="padding: 8px;">{{ $tv->descript }}</td> --}}
                    {{-- <td style="padding: 8px;">{{ number_format($tv->filesize, 0, '.', ',') }}</td> --}}
                    {{-- <td style="padding: 8px;">{{ $tv->filetype}}</td> --}}
                    <td style="padding: 8px;">{{ $tv->created_at }}</td>
                    {{-- <td style="padding: 8px;">{{ $tv->updated_at }}</td> --}}
                    <td style="padding: 8px;">{{ $tv->url }}</td>
                    {{-- <td style="padding: 8px;">{{$tv->remarks}}</td> --}}
                    <td style="padding: 8px;">
                   <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewTvModal-{{ $tv->tv_id }}">
    <i class="bi bi-gear-wide-connected"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="viewTvModal-{{ $tv->tv_id }}" tabindex="-1" aria-labelledby="viewTvModalLabel-{{ $tv->sign_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid #dee2e6;">
                <h5 class="modal-title" id="viewTvModalLabel-{{ $tv->tv_id }}" style="font-size: 20px;">
                    <i class="bi bi-film"></i> View Smart TV | {{ $tv->tv_id }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;">
              <div class="iframe-container position-relative">
   <iframe
    id="tv-iframe-{{ $tv->tv_id }}"
    src="{{ route('tv.display', $tv->tv_id) }}"
    style="width: 100%; height: 500px; border: none;"
    allow="autoplay"
></iframe>


    <button
        id="mute-toggle-{{ $tv->sign_id }}"
        class="btn btn-primary position-absolute"
        style="top: 10px; right: 10px; z-index: 999;"
        onclick="document.getElementById('tv-iframe-{{ $tv->sign_id }}').contentWindow.postMessage('unmute', '*')"
    >
        <i class="bi bi-volume-up"></i> Start with Sound
    </button>
</div>

            </div>
        </div>
    </div>
</div>

                        {{-- <a href="{{ route('signage.edit', $signage->sign_id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                        <form action="{{ route('tv.delete', $tv->tv_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center" style="padding: 8px;">No Smart TV found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="createTvModal" tabindex="-1" aria-labelledby="createTvModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid #dee2e6;">
                <h5 class="modal-title" id="createTvModalLabel">Add Smart Tv</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <iframe src="{{ route('tv.create') }}" style="width: 100%; height: 500px; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const muteBtns = document.querySelectorAll('[id^="mute-toggle-"]');

    muteBtns.forEach(btn => {
        const tvId = btn.id.split('-').pop();
        const iframe = document.getElementById(`tv-iframe-${tvId}`);
        const player = iframe.contentWindow;

        btn.addEventListener('click', function () {
            const isMuted = iframe.hasAttribute('muted');
            if (isMuted) {
                iframe.removeAttribute('muted');
                btn.querySelector('i').classList.replace('bi-volume-mute', 'bi-volume-up');
                btn.textContent = ' Unmute';
            } else {
                iframe.setAttribute('muted', 'true');
                btn.querySelector('i').classList.replace('bi-volume-up', 'bi-volume-mute');
                btn.textContent = ' Mute';
            }
        });
    });
});

</script>
@include('layout.footer')
