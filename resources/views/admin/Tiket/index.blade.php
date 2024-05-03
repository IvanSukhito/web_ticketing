@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Acara</h6>
                    <a href="{{ route('admin.acara.tickets.create', $acara->id) }}"class="btn btn-primary float-end">Buat
                        Tiket</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Tiket </th>


                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Harga</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kuantitas</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Max Pembelian</th>
                                    <th class="text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    {{-- {{ dd($acara->pictures) }} --}}
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->name }}</td>
                                        <td>{{ number_format($ticket->harga) }}</td>
                                        <td>{{ number_format($ticket->kuantitas) }}</td>
                                        <td>{{ number_format($ticket->max_buy) }}</td>
                                        <td>
                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('admin.acara.tickets.edit', [
                                                    'acara' => $acara->id,
                                                    'ticket' => $ticket->id,
                                                ]) }}"class="btn btn-warning">Edit</a>


                                            {{-- FORM DELETE --}}
                                            <form onsubmit="return confirm('Hapus ticket {{ $acara->name }}?')"
                                                action="{{ route('admin.acara.tickets.destroy', [
                                                    'acara' => $acara->id,
                                                    'ticket' => $ticket->id,
                                                ]) }}"method="POST">
                                                @method('DELETE') @csrf <input type="submit" class="btn btn-danger"
                                                    value="Delete">
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
