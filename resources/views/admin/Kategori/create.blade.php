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
                    <form action = "{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input name ="name"type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Music">
                        </div>
                        <div class="form-group">
                            <label for="p">Icon Kategori</label>
                            <input name ="files[]" type="file" accept="image/png, image/gif, image/jpeg" class="form-control" multiple id="p"
                                aria-describedby="emailHelp" placeholder="Enter Height">
                        </div>




                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-bottom')
    @parent
    <script type="text/javascript">
        $(document).ready(function() {
            $("#category").select2();
        });
    </script>
@stop
