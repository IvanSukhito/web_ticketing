@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Acara</h6>
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
                    <form action="{{ route('acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Acara</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Nama Acara" value="{{ $acara->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Deskripsi">{{ $acara->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Nama Pelaksana</label>
                            <input name="namaPelaksana" type="text" class="form-control" id="pelaksana"
                                placeholder="Nama Pelaksana" value="{{ $acara->namaPelaksana }}">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input name="lokasi" type="text" class="form-control" id="lokasi"
                                placeholder="Lokasi Acara" value="{{ $acara->lokasi }}">
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input name="waktu" type="datetime-local" class="form-control" id="waktu"
                                placeholder="Tanggal Mulai Acara"
                                value="{{ \Carbon\Carbon::parse($acara->waktu)->format('Y-m-d\TH:i') }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Pilih Kategori</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Pilih Kategori Acara</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $acara->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="p">Picture</label>
                            <input name="files[]" type="file" class="form-control" multiple id="p"
                                aria-describedby="emailHelp" placeholder="Enter Height">
                            <br>
                            @if (isset($acara->photos))
                                <div class="row">
                                    @foreach ($acara->photos as $photo)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $photo) }}"
                                                class="img-thumbnail photo-thumbnail">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <br><br>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .photo-thumbnail {
            width: 100%;
            max-width: 150px;
            /* Set the maximum width for the image */
            height: auto;
            /* Maintain aspect ratio */
            margin-bottom: 10px;
            /* Add some space between images */
        }

        .form-group .row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* Space between image columns */
        }
    </style>
@endsection

@section('script-bottom')
    @parent
    <script type="text/javascript">
        $(document).ready(function() {
            $("#category_id").select2();
        });
    </script>
@stop
