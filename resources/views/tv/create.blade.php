@extends('layout.title') 

<div class="container mt-4">

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

        <div class="mb-3" style="font-size: 10px;">
            <label for="tv" class="form-label">TV</label>
            <input type="text" name="tv" class="form-control" value="{{ old('tv') }}" required>
            
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
            
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
            
            <label for="department" class="form-label">Department</label>
            <input type="text" name="department" class="form-control" value="{{ old('department') }}">
            
            <label for="descript" class="form-label">Description</label>
            <textarea name="descript" class="form-control">{{ old('descript') }}</textarea>
            
            <label for="remarks" class="form-label">Remarks</label>
            <textarea name="remarks" class="form-control">{{ old('remarks') }}</textarea>
            
            <label for="attach" class="form-label">Attachment</label>
            <input style="font-size: 10px;" type="file" name="attach" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@include('layout.footer')