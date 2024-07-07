@extends('layouts.master')

@section('content')
    <div>
        <header>
            <nav class = "home-custom">
                <a href="{{ route('home') }}">Home</a>
            </nav>
        </header>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>My Transaction</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Thumbnail
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu Acara</th>
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

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    {{-- {{ dd($acara->pictures) }} --}}
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>
                                            <img src="{{ $transaction->acara->thumbnail }}" alt="" width="100">
                                        </td>
                                        <td>{{ $transaction->acara->name }}</td>
                                        <td>{{ $transaction->acara->waktu->format('d-m-Y') }}</td>
                                        <td>{{ $transaction->email }}</td>
                                        <td>{{ $transaction->kuantitas }}</td>
                                        <td>Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>{{ $transaction->payment_method }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $transactions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
