@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit ticket</h6>
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
                        action = "{{ route('admin.acara.tickets.update', [
                            'ticket' => $ticket->id,
                            'acara' => $acara->id,
                        ]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama ticket</label>
                            <input name ="name"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama ticket"
                                value="{{ isset($ticket) ? $ticket->name : old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input name ="harga"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Harga"
                                value="{{ isset($ticket) ? $ticket->harga : old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="kuantitas">Kuantitas</label>
                            <input name ="kuantitas"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Kuantitas "
                                value="{{ isset($ticket) ? $ticket->kuantitas : old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="max_buy">Max Pembelian</label>
                            <input name ="max_buy"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Max Pembelian"
                                value="{{ isset($ticket) ? $ticket->max_buy : old('name') }}">
                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
