@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Acara</h6>
                    <a href="{{ route('acara.create') }}" class="btn btn-primary float-end">Buat Acara</a>
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
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{-- Action Buttons --}}
                                            <div class="d-flex">
                                                {{-- Edit Button --}}
                                                <a href="{{ route('acara.edit', ['acara' => $category->id]) }}"
                                                    class="btn btn-warning me-2">Edit</a>
                                                {{-- Delete Form --}}
                                                <form onsubmit="return confirm('Hapus Acara {{ $category->name }}?')"
                                                    action="{{ route('acara.destroy', ['acara' => $category->id]) }}"
                                                    method="POST">
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
