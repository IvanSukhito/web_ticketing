@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Kategori</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   
                    <form method="POST" action="{{ route('admin.kategori.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input name="name" type="text" class="form-control" id="name"
                                aria-describedby="emailHelp" placeholder="Music"
                                value="{{ isset($category) ? $category->name : old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon Kategori</label>
                            <input name="icon" type="file" accept="image/png, image/gif, image/jpeg" class="form-control" id="imageInput" aria-describedby="emailHelp" placeholder="Enter Height">
                            <br>
                              <!-- Old-->
                              <img src="{{asset('storage/'.$category->icon)}}" class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md" alt="no_image"> <b>Icon Old</b>
                            <br><br>
                            <!-- New -->
                            <img id="uploadedImage" src="#" alt="Uploaded Image" style="display:none; max-width: 200px; max-height: 200px;" class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">  <b id="fileNew" style="display:none;"></b>
                            @error('icon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')
    @parent
    <script type="text/javascript">
        $(document).ready(function() {
            $("#category").select2();
        });

        $(document).ready(function() {
            $('#imageInput').on('change', function(event) {
                const imageFile = event.target.files[0];
                if (imageFile) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $('#uploadedImage').attr('src', e.target.result).show();
                        $('#fileNew').text('Uploaded New File: '+imageFile.name).show();
                    };

                    reader.readAsDataURL(imageFile);
                }
            });
        });
    </script>
@stop
