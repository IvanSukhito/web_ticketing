@extends('layouts.master')

@section('content')
    @if ($errors->any())
    @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show  text-white " role="alert">
                
                        <span class="alert-icon"><i class="ni ni-time-alarm"></i></span>
                        <span class="alert-text"><strong>Danger!</strong> {{ $error }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                  
            </div>
    @endforeach                
        
    @endif
<form action = "{{ route('admin.acara.store') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Acara</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
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
                            <label for="name">Nama Acara</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" required="" aria-describedby="emailHelp" placeholder="Nama Acara">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu</label>
                            <input name ="waktu" type="datetime-local" class="form-control" id="exampleInputEmail1"required
                                aria-describedby="emailHelp" placeholder="Tanggal Mulai Acara">

                        </div>
                      
                        <div class="form-group">
                            <label for="p">Picture Thumbnail</label>
                            <input name ="files[]"multiple type="file" class="form-control" id="p" accept="image/jpeg, image/png, image/jpg, image/gif" required
                                aria-describedby="emailHelp" placeholder="Enter Height">
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
                            <input name="lokasi" type="text" class="form-control" id="inputLokasi" required="" aria-describedby="lokasi" placeholder="Lokasi Acara">

                        </div>
                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input name="latitude" type="text" class="form-control" id="inputLatitude"  aria-describedby="latitude" placeholder="opsional latitude">
    
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Longitude</label>
                                <input name="longitude" type="text" class="form-control" id="inputLongitude"  aria-describedby="longitude" placeholder="opsional longitude">
    
                            </div>
                        </div>
                        <div class="form-group" id="directMap">
                          
                        </div>
                                
                        <div class="form-group">
                            <label>Image Content (1120 x 400)</label> 
                            <input name ="image_content"multiple type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" id="p" required
                                aria-describedby="emailHelp" placeholder="Enter Height">
                        </div>
                       
                        <div class="form-group">
                            <label for="description">Description</label>
                       
                            <textarea name="description" class="form-control" id="editor"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="pelaksana">Penanggung Jawab /Pelaksana </label>
                            <input name="namaPelaksana" type="text" class="form-control" id="pelaksana" required="" aria-describedby="emailHelp" placeholder="Penanggung Jawab / Pelaksana">

                        </div>
                      
                    
                     

                        <button type="submit" class="btn btn-primary">Submit</button>
                    
                </div>
            </div>
        </div>
    </div>
</form>
          
@endsection
@section('script-bottom')
    @parent
    <script type="text/javascript">
    // setTimeout(function() {
    // $('.alert').fadeOut('slow');
    // }, 3000); //

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

           
        });
    </script>
@stop
