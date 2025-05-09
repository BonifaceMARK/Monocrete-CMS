@include('layout.title')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('signage.update', $signage->sign_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <table style="font-size:10px;" class="container-fluid table table-bordered">
        <tbody>
            <tr>
                <th><label for="sign_id" class="form-label">Sign ID</label></th>
                <td>
                    <input style="font-size:10px;" type="text" class="form-control" name="sign_id" value="{{ $signage->sign_id }}" readonly>
                </td>
            </tr>

            <tr>
                <th><label for="tv" class="form-label">TV</label></th>
                <td>
                    <input style="font-size:10px;" type="text" class="form-control" name="tv" id="tv" value="{{ old('tv', $signage->tv) }}" readonly>
                </td>
            </tr>

            <tr>
                <th><label for="location" class="form-label">Location</label></th>
                <td>
                    <input style="font-size:10px;" type="text" class="form-control" name="location" id="location" value="{{ old('location', $signage->location) }}">
                </td>
            </tr>

            <tr>
                <th><label for="filename" class="form-label">Upload New File (optional)</label></th>
                <td>
                    <input style="font-size:10px;" type="file" class="form-control" name="filename" id="filename">
                    @if ($signage->filename)
                    <label>Current file: 
                        <a href="{{ asset('storage/contents/' . $signage->filename) }}" target="_blank">View</a>
                    </label>
                    
                    @endif
                </td>
            </tr>

            <tr>
                <th><label for="filetype" class="form-label">File Type</label></th>
                <td>
                    <input style="font-size:10px;" type="text" class="form-control" name="filetype" id="filetype" value="{{ old('filetype', $signage->filetype) }}" readonly>
                </td>
            </tr>

            <tr>
                <th><label for="filesize" class="form-label">File Size (bytes)</label></th>
                <td>
                    <input style="font-size:10px;" type="number" class="form-control" name="filesize" id="filesize" value="{{ old('filesize', $signage->filesize) }}" readonly>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary" style="font-size:10px;">Update</button>
        <a href="{{ route('signage.index') }}" class="btn btn-secondary" style="font-size:10px;">Cancel</a>
    </div>
</form>

@include('layout.footer')
