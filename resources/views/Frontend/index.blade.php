@extends('layouts.frontend')


@section('content')

<br>
Isi 
<br>

@endsection
@section('script-bottom')
    @parent
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //$("#category").select2();



            $('#carouselExampleAutoplaying .carousel-control-prev, #carouselExampleAutoplaying .carousel-control-next')
                .click(function() {
                    // Temukan item aktif saat ini dan ubah prioritasnya
                    var activeItem = $('.carousel-item.active');
                    console.log(activeItem);
                    activeItem.each(function() {
                        $(this).attr('data-prioritas', 1);
                        console.log('Item aktif sekarang:', $(this).data('id'));
                    });
                });
        });
    </script>

@stop
