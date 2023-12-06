@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex product-page-main p-0  product-des-main">
                @if(count($productDetail->productImages)>0)
                    <div class="col-xl-6 col-md-6 pe-5">
                        <div class="row">
                            <div class="col-xl-4 product-thumbnail">
                                <div class="pro-slide-right">
                                    @foreach($productDetail->productImages as $media)
                                        <div>
                                            <div class="slide-box"><img
                                                    src="{{  $media->image }}" alt=""></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xl-8 product-main">
                                <div class="pro-slide-single">
                                    @foreach($productDetail->productImages as $media)
                                        <div><img class="img-fluid"
                                                  src="{{ $media->image }}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-xl-6">
                    <div class="features-faq product-box product-detail-page container h-100">
                        <div class="card-body align-items-center h-100">
                            <div class="product-detail-description">
                                <h3 class="">{{$productDetail->title}}</h3>
                                <div class="d-flex flex-column">
                                    <div class="mb-3">
                                        <div class="page-des-detail d-flex"><h5>Price :</h5>
                                            <span>${{ $productDetail->price }}</span></div>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="page-des-detail d-flex"><h5>Discount Percentage :</h5>
                                            <span>{{ $productDetail->discount_percentage }} %</span></div>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="page-des-detail d-flex"><h5>Rating :</h5>
                                            <span>{{ $productDetail->rating }}</span></div>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="page-des-detail d-flex"><h5>Stock :</h5>
                                            <span>{{ $productDetail->stock }}</span></div>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="page-des-detail d-flex"><h5>Brand :</h5>
                                            <span>{{ $productDetail->brand }}</span></div>
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="page-des-detail d-flex"><h5>Category :</h5>
                                            <span>{{ $productDetail->category }}</span></div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="page-des-detail"><h5>Description :</h5>
                                            <span>{{$productDetail->description}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider/slick-theme.js') }}"></script>
@endsection
