@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Acara</h6>
                    <a href="{{ route('create') }}"class="btn btn-primary float-end">Buat Acara</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Lokasi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jenis Acara</th>
                                    <th class="text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acaras as $acara)
                                    {{-- {{ dd($acara->pictures) }} --}}
                                    <tr>
                                        <td>{{ $acara->id }}</td>
                                        <td>{{ $acara->name }}</td>
                                        <td>{{ $acara->namaPelaksana }}</td>
                                        <td>{{ $acara->lokasi }}</td>
                                        <td>{{ $acara->waktu->format('d M Y') }}</td>
                                        <td>{{ $acara->jenis_acara }}</td>
                                        <td>
                                            <a href="/acara/{{ $acara->id }}/edit"class="btn btn-warning">Edit</a>
                                            <form action="/acara/{{ $acara->id }}"method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
