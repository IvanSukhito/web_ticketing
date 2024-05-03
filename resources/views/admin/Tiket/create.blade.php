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
                    <form
                        action = "{{ route('admin.acara.tickets.store', [
                            'acara' => $acara->id,
                        ]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Nama Tiket</label>
                            <input name ="name"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Acara">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <textarea name="harga" type="text" id="harga" class="form-control" aria-describedby="emailHelp"
                                placeholder="Deskripsi"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="kuantitas">Kuantitas</label>
                            <input name ="kuantitas" type="text" class="form-control" id="kuantitas"
                                aria-describedby="emailHelp" placeholder="kuantitas">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Max Pembelian</label>
                            <input name ="max_buy" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Max Pembelian">



                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
