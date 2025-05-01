@extends('layout.title')

<div class="container mt-3">
    <form action="{{ route('signage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group" >
            <label for="tv" style="font-size: 10px;" >TV</label>
            <input type="text" name="tv" id="tv" class="form-control" style="font-size: 10px;"  value="{{ old('tv') }}" required>
            @error('tv')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="location" style="font-size: 10px;" >Location</label>
            <input type="text" name="location" id="location" class="form-control" style="font-size: 10px;"  value="{{ old('location') }}" required>
            @error('location')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="filename" style="font-size: 10px;" >File</label>
            <input type="file" name="filename" id="filename" style="font-size: 10px;"  class="form-control" required>
            @error('filename')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="font-size: 10px;" >Create</button>
    </form>
</div>


@include('layout.footer')