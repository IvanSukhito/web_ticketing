@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Acara</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">

                    <form action = "{{ route('admin.acara.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Acara</label>
                            <input name ="name"type="text" class="form-control" id="exampleInputEmail1" required
                                aria-describedby="emailHelp" placeholder="Nama Acara">

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" type="text" id="description" class="form-control" aria-describedby="emailHelp" required
                                oninvalid="this.setCustomValidity('Masukkan Deskripsi Disini')" oninput="this.setCustomValidity('')"
                                placeholder="Deskripsi"> </textarea>

                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Nama Pelaksana</label>
                            <input name ="namaPelaksana" type="text" class="form-control" id="pelaksana" required
                                aria-describedby="emailHelp" placeholder="Nama Pelaksana">

                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu</label>
                            <input name ="waktu" type="datetime-local" class="form-control" id="exampleInputEmail1"required
                                aria-describedby="emailHelp" placeholder="Tanggal Mulai Acara">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kategori</label>
                            <select id="category" class="form-control" name="category_id">
                                <option value="0">Pilih Kategori Acara</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="p">Picture</label>
                            <input name ="files[]"multiple type="file" class="form-control" id="p" required
                                aria-describedby="emailHelp" placeholder="Enter Height">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input name ="lokasi" type="text" class="form-control" id="exampleInputEmail1"required
                                oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')"
                                oninput="this.setCustomValidity('')" aria-describedby="emailHelp"
                                placeholder="Lokasi Acara">

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Longtitude</label>
                                <input name ="lokasi" type="text" class="form-control" id="exampleInputEmail1"required
                                    oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')"
                                    oninput="this.setCustomValidity('')" aria-describedby="emailHelp"
                                    placeholder="Lokasi Acara">
    
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input name ="lokasi" type="text" class="form-control" id="exampleInputEmail1"required
                                    oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')"
                                    oninput="this.setCustomValidity('')" aria-describedby="emailHelp"
                                    placeholder="Lokasi Acara">
    
                            </div>
                        </div>
                        <div class="form-group">
                            <iframe src="https://www.google.com/maps?q=sekolah+cinta+kasih+tzu+chi&hl=es;z=14&output=embed"></iframe>  
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Acara</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">

                    <form action="http://127.0.0.1:8000/admin/acara" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="Aff7tEF1znpPeUt9hPzCZKuadCuatuNw8tArhsNF" autocomplete="off">                        <div class="form-group">
                            <label for="name">Nama Acara</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" required="" aria-describedby="emailHelp" placeholder="Nama Acara">

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" type="text" id="description" class="form-control" aria-describedby="emailHelp" required="" oninvalid="this.setCustomValidity('Masukkan Deskripsi Disini')" oninput="this.setCustomValidity('')" placeholder="Deskripsi"> </textarea>

                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Nama Pelaksana</label>
                            <input name="namaPelaksana" type="text" class="form-control" id="pelaksana" required="" aria-describedby="emailHelp" placeholder="Nama Pelaksana">

                        </div>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu</label>
                            <input name="waktu" type="datetime-local" class="form-control" id="exampleInputEmail1" required="" aria-describedby="emailHelp" placeholder="Tanggal Mulai Acara">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Kategori</label>
                            <select id="category" class="form-control select2-hidden-accessible" name="category_id" data-select2-id="category" tabindex="-1" aria-hidden="true">
                                <option value="0" data-select2-id="2">Pilih Kategori Acara</option>
                                                                    <option value="1">Music</option>
                                                                    <option value="2">FIlm</option>
                                                                    <option value="3">Art</option>
                                                                    <option value="4">Sport</option>
                                                                    <option value="5">Anime</option>
                                                                    <option value="6">Otomatif</option>
                                                                    <option value="7">Teater</option>
                                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 925.333px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-category-container"><span class="select2-selection__rendered" id="select2-category-container" role="textbox" aria-readonly="true" title="Pilih Kategori Acara">Pilih Kategori Acara</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                        </div>
                        <div class="form-group">
                            <label for="p">Picture</label>
                            <input name="files[]" multiple="" type="file" class="form-control" id="p" required="" aria-describedby="emailHelp" placeholder="Enter Height">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1" required="" oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')" oninput="this.setCustomValidity('')" aria-describedby="emailHelp" placeholder="Lokasi Acara">

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Longtitude</label>
                                <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1" required="" oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')" oninput="this.setCustomValidity('')" aria-describedby="emailHelp" placeholder="Lokasi Acara">
    
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1" required="" oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')" oninput="this.setCustomValidity('')" aria-describedby="emailHelp" placeholder="Lokasi Acara">
    
                            </div>
                        </div>
                        <div class="form-group">
                            <iframe src="https://www.google.com/maps?q=sekolah+cinta+kasih+tzu+chi&amp;hl=es;z=14&amp;output=embed"></iframe>  
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
