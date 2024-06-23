@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Admin</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Banner</li>

                    </ol>
                   
</nav>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Banner</h6>
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary float-end">Tambah Banner</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th class="text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getBanner as $dataBanner)
                                    <tr>
                                        <td>{{ $dataBanner->id }}</td>
                                        <td>{{ $dataBanner->name }}</td>
                                        <td>
                                            {{-- Action Buttons --}}
                                            <div class="d-flex">
                                                {{-- Edit Button --}}
                                                <a href="{{ route('admin.banners.edit', $dataBanner->id) }}"
                                                    class="btn btn-warning me-2">Edit</a>
                                                {{-- Delete Form --}}
                                                <form onsubmit="return confirm('Hapus Kategori {{ $dataBanner->name }}?')"
                                                    action="{{ route('admin.banners.destroy', $dataBanner->id) }}" method="POST">
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
