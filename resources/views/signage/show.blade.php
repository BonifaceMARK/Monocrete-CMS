@include('layout.title')
  
            <table class="table table-bordered" style="font-size: 10px;">
                <tbody>
                    <tr>
                        <th>Sign ID</th>
                        <td>{{ $signages->sign_id }}</td>
                    </tr>
                    <tr>
                        <th>TV</th>
                        <td>{{ $signages->tv }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $signages->location }}</td>
                    </tr>
                    <tr>
                        <th>Filename</th>
                        <td>{{ $signages->filename }}</td>
                    </tr>
                    <tr>
                        <th>Filetype</th>
                        <td>{{ $signages->filetype }}</td>
                    </tr>
                    <tr>
                        <th>Filesize</th>
                        <td>{{ $signages->filesize }} KB</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $signages->created_at->format('F d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Url</th>
                        <td>{{ $signages->url }}</td>
                    </tr>
                </tbody>
            </table>
            @php
            $fileExt = strtolower(pathinfo($signages->filename, PATHINFO_EXTENSION));
            $fileUrl = asset('storage/' . $filePath);
        @endphp
        
        <div style="text-align: center; margin-bottom: 1rem;">
            @if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                <img src="{{ $fileUrl }}" alt="Image Preview" style="max-width: 100%; max-height: 400px;" />
            
            @elseif (in_array($fileExt, ['mp4', 'webm', 'ogg']))
                <video controls style="max-width: 100%; max-height: 400px;">
                    <source src="{{ $fileUrl }}" type="{{ $signages->filetype }}">
                    Your browser does not support the video tag.
                </video>
        
            @elseif (in_array($fileExt, ['mp3', 'wav']))
                <audio controls>
                    <source src="{{ $fileUrl }}" type="{{ $signages->filetype }}">
                    Your browser does not support the audio element.
                </audio>
        
            @elseif ($fileExt === 'pdf')
                <iframe src="{{ $fileUrl }}" width="100%" height="600px"></iframe>
        
            @else
                <a href="{{ $fileUrl }}" class="btn btn-primary" target="_blank" rel="noopener">
                    Download / View File ({{ strtoupper($fileExt) }})
                </a>
            @endif
        </div>
        

     

@include('layout.footer')