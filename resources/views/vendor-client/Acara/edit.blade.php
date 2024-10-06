@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Acara as <b style="color :#17C1E8; ">Vendor</b></h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('vendor.acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                   
                                    <div class="card-body px-2 pt-0 pb-2">
                                    <div class="form-group">
                                                <label for="category_id">Pilih Kategori</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option value="">Pilih Kategori Acara</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $acara->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama Acara</label>
                                                <input name="name" value="{{$acara->name}}" type="text" class="form-control" id="exampleInputEmail1" required="" aria-describedby="emailHelp" placeholder="Nama Acara">
                    
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Waktu</label>
                                                <input name ="waktu" value="{{$acara->waktu}}" type="datetime-local" class="form-control" id="exampleInputEmail1"required
                                                    aria-describedby="emailHelp" placeholder="Tanggal Mulai Acara">
                    
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="p">Picture Thumbnail</label>
                                                <input name ="files[]"multiple type="file"accept="image/png, image/gif, image/jpeg" class="form-control" id="imageInput" 
                                                    aria-describedby="emailHelp" placeholder="Enter Height">
                                                    <br>
                                                     <!-- Old-->
                                                     <img src="{{ $acara->thumbnail }}" style="max-width: 200px; max-height: 200px;" class="bg-gradient-primary shadow text-center border-radius-md" alt="{{$acara->name}}"> <b>@lang('Banner Old')</b>
                                                <br><br>
                                                <!-- New -->
                                                <img id="uploadedImage" src="#" alt="Uploaded Image" style="display:none; max-width: 200px; max-height: 200px;" class="bg-gradient-primary shadow text-center border-radius-md">  <b id="fileNew" style="display:none;"></b>  
                                            </div>
                                           
                                          
                                         
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                          
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                 
                                    <div class="card-body px-2 pt-0 pb-2">
                                  
                                    <div class="form-group">
                                                <label for="exampleInputEmail1">Lokasi</label>
                                                <input name="lokasi" value="{{$acara->lokasi}}" type="text" class="form-control" id="inputLokasi" required="" oninvalid="this.setCustomValidity('Masukkan Lokasi Disini')" oninput="this.setCustomValidity('')" aria-describedby="emailHelp" placeholder="Lokasi Acara">
                    
                                            </div>
                                            <div class="row">
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputEmail1">Latitude</label>
                                                    <input name="latitude" value="{{$acara->latitude}}" type="text" class="form-control" id="inputLatitude"  aria-describedby="latitude" placeholder="opsional latitude">
                        
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputEmail1">Longitude</label>
                                                    <input name="longitude" value="{{ $acara->longitude}}" type="text" class="form-control" id="inputLongitude"  aria-describedby="longitude" placeholder="opsional longitude">
                        
                                                </div>
                                            </div>
                                            <div class="form-group" id="directMap">
                                              
                                            </div>
                                                    
                                            <div class="form-group">
                                                <label>Image Content (1120 x 400)</label> 
                                                <input name ="image_content" type="file" accept="image/png, image/gif, image/jpeg" class="form-control" multiple id="imageInput2" >
                    
                                                    <br>
                                                     <!-- Old-->
                                                     <img src="{{ asset('storage/'.$acara->image_content) }}" style="max-width: 200px; max-height: 200px;" class="bg-gradient-primary shadow text-center border-radius-md" alt="{{$acara->name}}"> <b>@lang('Banner Old')</b>
                                                <br><br>
                                                <!-- New -->
                                                <img id="uploadedImage2" src="#" alt="Uploaded Image" style="display:none; max-width: 200px; max-height: 200px;" class="bg-gradient-primary shadow text-center border-radius-md">  <b id="fileNew2" style="display:none;"></b>  
                                            </div>
                                           
                                            <div class="form-group">
                                               
                                                <label for="description">Description</label>
                                                <textarea name="description" type="text" class="texteditor" id="editor" >{{ old('description', $acara->description  ) }}</textarea>
                    
                                            </div>
                                            <div class="form-group">
                                                <label for="pelaksana">Penanggung Jawab /Pelaksana </label>
                                                <input name="namaPelaksana" value="{{$acara->namaPelaksana}}" type="text" class="form-control" id="pelaksana" required="" aria-describedby="emailHelp" placeholder="Penanggung Jawab / Pelaksana">
                    
                                            </div>
                                          
                                        
                                         
                    
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .photo-thumbnail {
            width: 100%;
            max-width: 150px;
            /* Set the maximum width for the image */
            height: auto;
            /* Maintain aspect ratio */
            margin-bottom: 10px;
            /* Add some space between images */
        }

        .form-group .row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* Space between image columns */
        }
    </style>
@endsection

@section('script-bottom')
    @parent
    <script type="text/javascript">
      
        $(document).ready(function() {
            $("#category").select2();


            $('#inputLokasi, #inputLatitude, #inputLongitude').change(function(){
                var str = $('#inputLokasi').val();
                var lokasiStr = str.replace(/\s+/g, '+').toLowerCase();
                console.log(lokasiStr);

                let latitude = $('#inputLatitude').val();
                let longitude = $('#inputLongitude').val();

                console.log(latitude);
                console.log(longitude);
                // if ada longitude sama laitudenya
                 
                if(!latitude && !longitude){
                 
                    console.log('lokasi aja');
                    hanyaLokasi();
                     // kalo ga ada timpa iframe map pake input lokasi aja
                    
                }else{
                    console.log('ada latitude');
                    adaLongLat();
                // timpa iframe map pake longitude sama laitude aja
                }
                   

        function hanyaLokasi(){
             
            let html = '<iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q='+lokasiStr+'&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br />';

            $('#directMap').html(html);
        
            return false;
        }
        function adaLongLat(){

            let html = '<iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord='+latitude+','+longitude+'&amp;q='+lokasiStr+'&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br />';

            $('#directMap').html(html);

            return false;
        }


            });

            $('#imageInput').on('change', function(event) {
                const imageFile = event.target.files[0];
                if (imageFile) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $('#uploadedImage').attr('src', e.target.result).show();
                        $('#fileNew').text('New Thumbnail: '+imageFile.name).show();
                    };

                    reader.readAsDataURL(imageFile);
                }
            });

            $('#imageInput2').on('change', function(event) {
                const imageFile = event.target.files[0];
                if (imageFile) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $('#uploadedImage2').attr('src', e.target.result).show();
                        $('#fileNew2').text('New Image Content: '+imageFile.name).show();
                    };

                    reader.readAsDataURL(imageFile);
                }
            });
           
        });
    </script>
@stop