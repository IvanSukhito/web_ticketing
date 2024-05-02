@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Acara</h6>
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
                    <form action = "{{ route('admin.acara.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Acara</label>
                            <input name ="name"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Acara">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" type="text" id="description" class="form-control" aria-describedby="emailHelp"
                                placeholder="Deskripsi"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Nama Pelaksana</label>
                            <input name ="namaPelaksana" type="text" class="form-control" id="pelaksana"
                                aria-describedby="emailHelp" placeholder="Nama Pelaksana">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input name ="lokasi" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Lokasi Acara">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu</label>
                            <input name ="waktu" type="datetime-local" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Tanggal Mulai Acara">
                        </div>
                        <div class="form-group">
                            <label for="jenis_acara">Jenis Acara</label>
                            <input name ="jenis_acara" type="text" class="form-control" id="jenis_acara"
                                aria-describedby="emailHelp" placeholder="Jenis Acara">
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
