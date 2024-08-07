@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Acara as Vendor</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">

                    <form action = "{{ route('vendor.acara.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Acara</label>
                            <input name ="name"type="text" class="form-control" id="exampleInputEmail1" required
                                aria-describedby="emailHelp" placeholder="Nama Acara">

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" type="text" id="description" class="form-control" aria-describedby="emailHelp" required
                                oninvalid="this.setCustomValidity('Masukkan Deskripsi Disini')" oninput="this.setCustomValidity('')"
                                placeholder="Deskripsi"> </textarea>

                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Nama Pelaksana</label>
                            <input name ="namaPelaksana" type="text" class="form-control" id="pelaksana" required
                                aria-describedby="emailHelp" placeholder="Nama Pelaksana">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input name ="lokasi" type="text" class="form-control" id="exampleInputEmail1"required
                                oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')"
                                oninput="this.setCustomValidity('')" aria-describedby="emailHelp"
                                placeholder="Lokasi Acara">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu</label>
                            <input name ="waktu" type="datetime-local" class="form-control" id="exampleInputEmail1"required
                                aria-describedby="emailHelp" placeholder="Tanggal Mulai Acara">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kategori</label>
                            <select id="category" class="form-control" name="category_id">
                                <option value="0">Pilih Kategori Acara</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="p">Picture</label>
                            <input name ="files[]"multiple type="file" class="form-control" id="p" required
                                aria-describedby="emailHelp" placeholder="Enter Height">
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
    </script>
@stop
