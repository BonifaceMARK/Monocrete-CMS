@extends('layout.title')

<div class="container mt-3">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
    <form action="{{ route('signage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tv" style="font-size: 10px;">TV</label>
            <select name="tv" id="tv" class="form-control" style="font-size: 10px;" required>
            <option value="" disabled selected>Select TV</option>
            @foreach($tvs as $signageTv)
                <option value="{{ $signageTv->tv }}" {{ old('tv') == $signageTv->tv ? 'selected' : '' }}>
                {{ $signageTv->tv }}
                </option>
            @endforeach
            </select>
            @error('tv')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- <div class="form-group">
            <label for="location" style="font-size: 10px;">Location</label>
            <select name="location" id="location" class="form-control" style="font-size: 10px;" required>
                <option value="" disabled selected>Select Location</option>
                @foreach($locations as $location)
                    <option value="{{ $location->location }}" {{ old('location') == $location->location ? 'selected' : '' }}>
                        {{ $location->location }}
                    </option>
                @endforeach
            </select>
            @error('location')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div> --}}
        

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