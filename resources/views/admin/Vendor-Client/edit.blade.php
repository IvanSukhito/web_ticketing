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
                        @foreach ($errors->all() as $error)
                     
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong style="color:white;"    >Failed!</strong> {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endforeach
                    @endif
                    <form action = "{{ route('admin.vendor-client.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Vendor</label>
                            <input name="name" type="text" class="form-control" id="name"
                                aria-describedby="emailHelp" placeholder="Music"
                                value="{{ isset($vendor) ? $vendor->name : old('name') }}">
                              
                        </div>
                        <div class="form-group">
                            <label for="name">Role</label>
                            <input name ="role" type="text" class="form-control" id="exampleInputConfirmPassword" value="vendor" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">No Telephone</label>
                            <input name="no_telp" type="text" class="form-control" id="name"
                                aria-describedby="emailHelp" placeholder="Music"
                                value="{{ isset($vendor) ? $vendor->no_telp : '' }}">
                                
                        <div class="form-group">
                            <label for="name">NIK</label>
                            <input name="nik" type="text" class="form-control" id="name"
                                aria-describedby="nik" placeholder="Music"
                                value="{{ isset($vendor) ? $vendor->nik : '' }}">
                            
                        </div>
                        <div class="form-group">
                            <label for="name">Email Vendor</label>
                            <input name="email" type="text" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Music"
                                value="{{ isset($vendor) ? $vendor->email : old('email') }}">
                             
                        </div>
                        <!-- <div class="form-group">
                            <label for="name">Password</label>
                            <input name ="password" type="password" class="form-control" id="exampleInputPassword" aria-describedby="Password" placeholder="Password123">
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input name ="password_confirmation" type="password" class="form-control" id="exampleInputConfirmPassword" aria-describedby="Password" placeholder="Password123">
                        </div> -->
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@section('script-bottom')
 
    <script type="text/javascript">
        $(document).ready(function() {
            $("#category").select2();
        });
    </script>
@stop
