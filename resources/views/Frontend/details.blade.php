@extends('layouts.homeUser')

@section('content')
    <main class="container" style="padding-top:20px;">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark" style="position: relative; width: 100%; height: 100%; overflow: hidden;">
    <div class="col-md-6 px-0" style="position: relative; width: 100%; height: 100%;">
        @if(isset($acara->image_content))
        <img src="{{ Storage::url($acara->image_content) }}" alt="" style="width: 100%; object-fit: cover;">
        @else
        <img src="{{ Storage::url('acaras/image_content/no-image.png') }}" alt="" style="width: 100%; object-fit: cover;">
        @endif
    </div>
</div>





        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    {{$acara->name}}
                </h3>

                <article class="blog-post">
                    <h2 class="blog-post-title">Description Events</h2>
                    @if (isset($acara->category) && isset($acara->category->name))
                          <p class="blog-post-meta"><b>Acara : </b> {{ $acara->category->name }} - {{ $acara->waktu->format('d-m-Y') }} </p>
                    @else
                        
                    @endif

                  

                    <p>{{ $acara->description }}</p>
                    <hr>
                    <p><b>Location Map : </b>{{$acara->lokasi}}</p>
                    @if (isset($acara->lokasi) || isset($acara->longitude))
                    <div id="directMap">
                          
                    </div>
                    @else
                    <p>Map Not available</p>
                    @endif

                   
                </article>

                <article class="blog-post">
                    <h3>Slot Terdaftar</h3>
                    <p>And don't forget about tables in these posts:</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Upvotes</th>
                                <th>Downvotes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alice</td>
                                <td>10</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <td>Bob</td>
                                <td>4</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Charlie</td>
                                <td>7</td>
                                <td>9</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Totals</td>
                                <td>21</td>
                                <td>23</td>
                            </tr>
                        </tfoot>
                    </table>

                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other
                        highly repetitive body text used throughout.</p>
                </article>

               
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="custom-card">
                        <h5 class="checkout-out">Check Out</h5>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>

                                <p class="custom-card-title ">
                                    @if ($acara->ticket)
                                        {{ $acara->ticket->name }}
                                    @else
                                        Tiket tidak tersedia
                                    @endif
                                </p>
                                <p class="custom-card-price ">
                                    @if ($acara->ticket)
                                        
                                        <p style="color:blue;">Rp {{ number_format($acara->ticket->harga, 0, ',', '.') ?? 'Tiket tidak tersedia' }}
                                    @else
                                        <p style="color:red;">Harga tidak tersedia</p>
                                    @endif
                                </p>

                            </div>
                        </div>
                        @if ($acara->ticket)
                        {{-- <div class ="d-flex justify-content-end mt-3 "> --}}
                        <a href="{{ route('checkout', $acara->slug) }}" class="btn btn-primary ">Buy
                            Ticket</a>
                        {{-- </div> --}}
                        @else
                                       
                        @endif
                     
                    </div>
                    <!-- isi nanti kalo ada bisa banyak tiket -->
                </div>

            </div>
        </div>

        <div class="row mb-2">
            @foreach($getRecomendAcara as $rekomendasi)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                   
                        @if(isset($rekomendasi->category->name))
                        <strong class="d-inline-block mb-2 text-primary">{{$rekomendasi->category->name}}</strong>
                        @else
                        <strong class="d-inline-block mb-2 text-primary">No Category</strong>
                        @endif
                        <h3 class="mb-0">{{$rekomendasi->name}}</h3>
                        <div class="mb-1 text-muted">{{date('d-M-Y', strtotime($rekomendasi->waktu))}}</div>
                        <p class="card-text mb-auto">This is a event from lapaktiket.com </p>
                        <a href="{{ route('detail', $rekomendasi->slug) }}" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                         focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <image x="0" y="0" width="100%" height="100%" xlink:href="{{$rekomendasi->thumbnail}}" />
                       
                    </svg>


                    </div>
                </div>
            </div>

            @endforeach
         
           
        </div>

    </main>
@endsection
@section('script-bottom')
    @parent
    <script type="text/javascript">
         let dataLokasi = "<?= $acara->lokasi ?>";
         let dataLatitude = "<?= $acara->latitude ?>";
         let dataLongitude = "<?= $acara->longitude ?>";
         console.log(dataLongitude);
         $(document).ready(function() {

            var lokasiStr = dataLokasi.replace(/\s+/g, '+').toLowerCase();
           
                    if(!dataLatitude && !dataLongitude){

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
                
                    let html = '<iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord='+dataLatitude+','+dataLongitude+'&amp;q='+lokasiStr+'&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br />';
                    
                    $('#directMap').html(html);
                    
                    return false;
                }
         });

        console.log(dataLokasi);
    </script>
@stop

