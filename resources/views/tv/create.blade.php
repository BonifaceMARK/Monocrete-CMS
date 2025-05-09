@extends('layout.title') 


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tv.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <table class="table table-bordered" class="container-fluid" style="font-size: 10px;">
            <tr>
                <td><label for="tv" class="form-label">TV</label></td>
                <td><input style="font-size: 10px;" type="text" name="tv" class="form-control" value="{{ old('tv') }}" required></td>
            </tr>
            <tr>
                <td><label for="brand" class="form-label">Brand</label></td>
                <td><input style="font-size: 10px;" type="text" name="brand" class="form-control" value="{{ old('brand') }}"></td>
            </tr>
            <tr>
                <td><label for="location" class="form-label">Location</label></td>
                <td><input style="font-size: 10px;" type="text" name="location" class="form-control" value="{{ old('location') }}"></td>
            </tr>
            <tr>
                <td><label for="department" class="form-label">Department</label></td>
                <td><input style="font-size: 10px;" type="text" name="department" class="form-control" value="{{ old('department') }}"></td>
            </tr>
            <tr>
                <td><label for="descript" class="form-label">Description</label></td>
                <td><textarea style="font-size: 10px;" name="descript" class="form-control">{{ old('descript') }}</textarea></td>
            </tr>
            {{-- <tr>
                <td><label for="remarks" class="form-label">Remarks</label></td>
                <td><textarea style="font-size: 10px;" name="remarks" class="form-control">{{ old('remarks') }}</textarea></td>
            </tr> --}}
            <tr>
                <td><label for="attach" class="form-label">Attachment</label></td>
                <td><input style="font-size: 10px;" style="font-size: 10px;" type="file" name="attach" class="form-control" accept="image/*"></td>
            </tr>
        </table>

        <button type="submit" style="font-size: 10px;" class="btn btn-primary">Save</button>
    </form>
@include('layout.footer')