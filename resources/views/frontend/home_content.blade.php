@extends('layouts.frontend_master')


@section('home_content')
    <div class="col-12">
        <div class="row">
            <div class="col-1">
                <div class="owl-carousel__nav" style="margin-top: 200%;">
                    <div class="owl-carousel__prev">Prev <img src="https://cdn-icons-png.freepik.com/256/271/271220.png?semt=ais_hybrid" style="width: 60px"></div>
                </div>
            </div>
            <div class="col-10">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="row">
                            @foreach ($slider_product as $k =>$row)
                                @if ($k == 6)
                                @break
                            @endif
                            <div class="col-4">
                                <div class="post-slide">
                                    <div class="row">
                                        <div class="col-3">
                                            <p style="font-size: 11px;text-align:left"> {{ $row->product_seller->name }}
                                                <img src="{{ asset('public/seller_images/' . $row->product_seller->image) }}"
                                                    style="height:60px;width: 60px;">
                                            </p>
                                        </div>
                                        <div class="col-6" style="background-color: rgb(243 243 255);">
                                            {{ $row->name }}
                                            <br>
                                            <p style="font-size: 11px"> Min Order: {{ $row->min_order }} | Serial No:
                                                {{ $row->serial_no }} </p>
                                        </div>
                                        <div class="col-3">
                                            <p style="font-size: 14px">
                                                {{ $row->seller_review }}
                                            </p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="post-img">
                                        @if (count($row->product_images))
                                            <img src="{{ asset('storage/app/' . $row->product_images[0]->images_name) }}"
                                                alt="Product image">
                                        @endif
                                        <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                    </div>

                                    <div class="row">
                                        <div class="col-4"><span class="post-date"><i
                                                    class="fa fa-clock-o"></i>{{ $row->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="col-4"><a href="#" class="read-more">{{ $row->location }}</a>
                                        </div>
                                        <div class="col-4"> <a href="#" class="read-more">{{ $row->status }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        @foreach ($slider_product as $k => $row1)
                        @if ($k > 5  && $k < 12)
                        <div class="col-4">
                            <div class="post-slide">
                                <div class="row">
                                    <div class="col-3">
                                        <p style="font-size: 11px;text-align:left"> {{ $row1->product_seller->name }}
                                            <img src="{{ asset('public/seller_images/' . $row1->product_seller->image) }}"
                                                style="height:60px;width: 60px;">
                                        </p>
                                    </div>
                                    <div class="col-6" style="background-color: rgb(243 243 255);">
                                        {{ $row1->name }}
                                        <br>
                                        <p style="font-size: 11px"> Min Order: {{ $row1->min_order }} | Serial No:
                                            {{ $row1->serial_no }} </p>
                                    </div>
                                    <div class="col-3">
                                        <p style="font-size: 14px">
                                            {{ $row1->seller_review }}
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="post-img">
                                    @if (count($row1->product_images))
                                        <img src="{{ asset('storage/app/' . $row1->product_images[0]->images_name) }}"
                                            alt="Product image">
                                    @endif
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>

                                <div class="row">
                                    <div class="col-4"><span class="post-date"><i
                                                class="fa fa-clock-o"></i>{{ $row1->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="col-4"><a href="#" class="read-more">{{ $row1->location }}</a>
                                    </div>
                                    <div class="col-4"> <a href="#" class="read-more">{{ $row1->status }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                    @endforeach

                </div>
            </div>
            <div class="item">
                <div class="row">
                    @foreach ($slider_product as $l =>$row)
                    @if ($l > 11  && $l < 18)
                    <div class="col-4">
                        <div class="post-slide">
                            <div class="row">
                                <div class="col-3">
                                    <p style="font-size: 11px;text-align:left"> {{ $row->product_seller->name }}
                                        <img src="{{ asset('public/seller_images/' . $row->product_seller->image) }}"
                                            style="height:60px;width: 60px;">
                                    </p>
                                </div>
                                <div class="col-6" style="background-color: rgb(243 243 255);">
                                    {{ $row->name }}
                                    <br>
                                    <p style="font-size: 11px"> Min Order: {{ $row->min_order }} | Serial No:
                                        {{ $row->serial_no }} </p>
                                </div>
                                <div class="col-3">
                                    <p style="font-size: 14px">
                                        {{ $row->seller_review }}
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="post-img">
                                @if (count($row->product_images))
                                    <img src="{{ asset('storage/app/' . $row->product_images[0]->images_name) }}"
                                        alt="Product image">
                                @endif
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>

                            <div class="row">
                                <div class="col-4"><span class="post-date"><i
                                            class="fa fa-clock-o"></i>{{ $row->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="col-4"><a href="#" class="read-more">{{ $row->location }}</a>
                                </div>
                                <div class="col-4"> <a href="#" class="read-more">{{ $row->status }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @endforeach

            </div>


        </div>
            </div>
        </div>
        <div class="col-1">
            <div class="owl-carousel__nav" style="margin-top: 200%;">
                <div class="owl-carousel__next">Next <img src="https://toppng.com/uploads/preview/arrow-icon-banner-freeuse-stock-next-icon-vector-11553389091crmgqevjd3.png" style="width: 60px"></div>
            </div>
        </div>
    </div>

    <a href="{{ url('/admin/dashboard') }}">Admin Panel</a>

</div>
@endsection
