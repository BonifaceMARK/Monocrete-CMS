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
                        <th>Updated At</th>
                        <td>{{ $signages->updated_at->format('F d, Y h:i A') }}</td>
                    </tr>
                </tbody>
            </table>
     

@include('layout.footer')