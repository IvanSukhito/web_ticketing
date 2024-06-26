@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Admin</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Vendor</li>

                    </ol>
                   
</nav>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Vendor</h6>
                    <a href="{{ route('admin.vendor-client.create') }}" class="btn btn-primary float-end">Tambah Vendor</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telp</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getVendor as $dataVendor)
                                    <tr>
                                        <td>{{ $dataVendor->id }}</td>
                                        <td>{{ $dataVendor->name }}</td>
                                        <td>{{ $dataVendor->no_telp }}</td>
                                        <td>{{ $dataVendor->email }}</td>
                                        <td>
                                            {{-- Action Buttons --}}
                                            <div class="d-flex">
                                                {{-- Edit Button --}}
                                                <a href="{{ route('admin.vendor-client.edit', $dataVendor->id) }}"
                                                    class="btn btn-warning me-2">Edit</a>
                                                {{-- Delete Form --}}
                                                <form onsubmit="return confirm('Hapus Kategori {{ $dataVendor->name }}?')"
                                                    action="{{ route('admin.vendor-client.destroy', $dataVendor->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                </form>

                                            </div>
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
@
