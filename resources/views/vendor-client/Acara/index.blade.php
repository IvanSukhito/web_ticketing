@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Acara</h6>
                    <a href="{{ route('vendor.acara.create') }}"class="btn btn-primary float-end">Buat Acara</a>
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
                                        Nama Pelaksana</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kategori</th>
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
                                        <td>{{ $acara->waktu->format('d M Y') }}</td>
                                        <td>{{ $acara->category->name ?? '-' }}</td>
                                        <td>
                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('vendor.acara.edit', [
                                                    'acara' => $acara->id,
                                                ]) }}"class="btn btn-warning">Edit</a>
                                            {{-- <a
                                                href="{{ route('vendor.acara.tickets.index', [
                                                    'acara' => $acara->id,
                                                ]) }}"class="btn btn-info">Tiket</a> --}}

                                            {{-- FORM DELETE --}}
                                            <form onsubmit="return confirm('Hapus Acara {{ $acara->name }}?')"
                                                action="{{ route('vendor.acara.destroy', [
                                                    'acara' => $acara->id,
                                                ]) }}"method="POST">
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
                    <div class="d-flex justify-content-center mt-3">
                        {{ $acaras->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
