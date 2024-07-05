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
                                        Phone Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email Address</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total Price</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Payment method</th>
                                    <th class="text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    {{-- {{ dd($acara->pictures) }} --}}
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->name }}</td>
                                        <td>{{ $transaction->phone_number }}</td>
                                        <td>{{ $transaction->email }}</td>
                                        <td>{{ $transaction->kuantitas }}</td>
                                        <td>Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>{{ $transaction->payment_method }}</td>

                                        <td>
                                            {{-- EDIT --}}
                                            <a href="#"class="btn btn-warning">Edit</a>
                                            <a href="#"class="btn btn-info">Tiket</a>
                                            <a href="#"class="btn btn-info">Transaction</a>
                                            {{-- FORM DELETE --}}
                                            {{-- <form onsubmit="return confirm('Hapus Acara {{ $acara->name }}?')"
                                                action="#"method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {{-- {{ $acaras->links('pagination::bootstrap-4') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
