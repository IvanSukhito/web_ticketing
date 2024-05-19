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
                        <div class ="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form
                        action = "{{ route('acara.update', [
                            'acara' => $acara->id,
                        ]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Acara</label>
                            <input name ="name"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Acara"
                                value="{{ isset($acara) ? $acara->name : old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" type="text" id="description" class="form-control" aria-describedby="emailHelp"
                                placeholder="Deskripsi">{{ isset($acara) ? $acara->description : old('description') }} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Nama Pelaksana</label>
                            <input name ="namaPelaksana" type="text" class="form-control" id="pelaksana"
                                aria-describedby="emailHelp"
                                placeholder="Nama Pelaksana"value="{{ isset($acara) ? $acara->namaPelaksana : old('namaPelaksana') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input name ="lokasi" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Lokasi Acara"value="{{ isset($acara) ? $acara->lokasi : old('lokasi') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu</label>
                            <input name ="waktu" type="datetime-local" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Tanggal Mulai Acara"value="{{ isset($acara) ? $acara->waktu : old('waktu') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kategori</label>
                            <select class="form-control" name="category_id">
                                <option value="">Pilih Kategori Acara</option>
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"{{ isset($acara) && $category->id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="p">Picture</label>
                            <input name ="files[]" type="file" class="form-control" multiple id="p"
                                aria-describedby="emailHelp" placeholder="Enter Height">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
