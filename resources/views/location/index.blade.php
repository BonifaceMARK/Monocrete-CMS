@include('layout.title')
<main id="main" class="main" class="container-fluid">
<div>
    <button type="button" style="font-size:10px;" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createLocationModal">
        <i class="bi bi-highlighter"></i> Add Location
    </button>
    <table style="font-size: 10px; width: 100%; border-collapse: collapse;" class="table table-bordered">
        <thead>
            <tr>
                {{-- <th style="padding: 8px; text-align: left;">#</th> --}}
                <th style="padding: 8px; text-align: left;">ID</th>
                {{-- <th style="padding: 8px; text-align: left;">TV</th> --}}
                <th style="padding: 8px; text-align: left;">Location</th>
                <th style="padding: 8px; text-align: left;">Department</th>
                {{-- <th style="padding: 8px; text-align: left;">Filename</th> --}}
                {{-- <th style="padding: 8px; text-align: left;">Filesize.(KB)</th> --}}
                {{-- <th style="padding: 8px; text-align: left;">Filetype</th> --}}
                <th style="padding: 8px; text-align: left;">Created At</th>
                <th style="padding: 8px; text-align: left;">Updated At</th>
                <th style="padding: 8px; text-align: left;">Remarks</th>
                <th style="padding: 8px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($locations as $location)
                <tr>
                    {{-- <td style="padding: 8px;">{{ $location->recid }}</td> --}}
                    <td style="padding: 8px;">{{ $location->location_id }}</td>
                    {{-- <td style="padding: 8px;">{{ $location->tv }}</td> --}}
                    <td style="padding: 8px;">{{ $location->location }}</td>
                    <td style="padding: 8px;">{{ $location->department }}</td>
                    {{-- <td  style="font-size: 10px; 
                    padding: 5px; 
                    border-radius: 5px; 
                    border: 1px solid #ffffff; 
                    background-color: #f8f9fa; 
                    color: #000000ee; 
                    box-shadow: 0px 2px 5px rgba(255, 255, 255, 0.1);
                    max-width: 130px; 
                    word-wrap: break-word; 
                    white-space: normal; 
                    overflow: hidden;">{{ $location->filename }}</td> --}}
                    {{-- <td style="padding: 8px;">{{ number_format($location->filesize, 0, '.', ',') }}</td> --}}
                    {{-- <td style="padding: 8px;">{{ $location->filetype}}</td> --}}
                    <td style="padding: 8px;">{{ $location->created_at }}</td>
                    <td style="padding: 8px;">{{ $location->updated_at }}</td>
                    <td style="padding: 8px;">REMARKS</td>
                    <td style="padding: 8px;">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewlocationModal-{{ $location->sign_id }}">
                            <i class="bi bi-view-stacked"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="viewlocationModal-{{ $location->location_id }}" tabindex="-1" aria-labelledby="viewlocationModalLabel-{{ $location->location_id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" style="max-width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header" style="border-bottom: 1px solid #dee2e6;">
                                        <h5 class="modal-title" id="viewSignageModalLabel-{{ $location->location_id }}" style="font-size: 20px;"> <i class="bi bi-film"></i> View Signage | {{ $signage->location_id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="padding: 0;">
                                        <iframe src="{{ route('location.show', $location->location_id) }}" style="width: 100%; height: 500px; border: none;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <a href="{{ route('location.edit', $location->sign_id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                        <form action="{{ route('location.delete', $location->location_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center" style="padding: 8px;">No Locations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="createLocationModal" tabindex="-1" aria-labelledby="createLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid #dee2e6;">
                <h5 class="modal-title" id="createLocationModalLabel">Add Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <iframe src="{{ route('location.create') }}" style="width: 100%; height: 500px; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
</main>
@include('layout.footer')
