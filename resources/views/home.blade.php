@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <h3 class="text-center">Product</h3>
            @if(count($products) > 0)
                @foreach($products as $key => $product)
                    <div class="col-md-4">
                        <a href="{{route('product-detail',$product->id)}}"
                           class="stock_detail position-relative text-decoration-none"
                           data-bs-original-title="" title="">
                            <div class="card-body text-center product-card-body">
                                <div class="product-img">
                                    <img src="{{$product->thumbnail_image}}" class="w-100 bg-img">

                                </div>
                                <div class="d-flex flex-column Stock_Purchase_details">
                                    <h5 class="text-black">{{$product->title}}</h5>
                                    <h6>${{$product->price}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="d-flex justify-content-end">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $(".bg-img").parent().addClass('bg-size');
            jQuery('.bg-img').each(function () {

                var el = $(this),
                    src = el.attr('src'),
                    parent = el.parent();

                parent.css({
                    'background-image': 'url(' + src + ')',
                    'background-size': 'conver',
                    'background-position': 'center',
                    'display': 'block',
                    'height': '250px',
                    'border-top-right-radius': '20px',
                    'border-top-left-radius': '20px',
                    'background-repeat':'no-repeat'
                });

                el.hide();
            })
        })
    </script>
@endsection


