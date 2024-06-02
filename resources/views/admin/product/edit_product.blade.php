@extends('layouts.master')

@section('content')
<style>
    .card-body ul{
        padding-left: 14px;
    }

    .card-body ul li{
        list-style: none;
    }

    .dz-message{
        display: none;
    }

    .dropzone {
        min-height: 150px;
        border: 1px solid #ced4da;
        background: white;
        padding: 20px 20px;
    }
</style>

<div class="col-12">

    <div class="alert alert-success" id="success_msg" role="alert" style="display: none;"></div>
    <div id="error_msg"></div>

    <form id="add_form">

        @method('PUT')
        <input type="hidden" name="id" value="{{ $product_data->id }}">

        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                            Basic Info
                        </a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="name" value="{{$product_data->name}}" class="form-control">
                                            <input type="hidden" name="id" value="{{$product_data->id}}" class="form-control">
                                        </div>
                                        <!-- /.form-group -->
                                        <div id="myId" class="dropzone" style="text-align: center;">
                                            <i class="fa fa-camera" style="font-size: 60px;color: #bbcdd2;"></i>
                                            <br>Drop images here
                                            <br>
                                            <strong>or select files</strong>
                                            <br>
                                            <small>Recommended size 800 x 800px for default theme.<br>JPG, GIF or PNG format.</small>
                                        </div>
                                        <!-- /.form-group -->

                                        <br>
                                        <div class="form-group">
                                            <label>Serial No.</label>
                                            <input type="text" name="serial" value="{{$product_data->serial_no}}" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Seller</label>
                                            <select class="form-control select2" name="seller">
                                                <option value="">Choose Seller</option>
                                                @foreach($all_seller as $row)
                                                <option value="{{ $row->id }}" @if($row->id == $product_data->seller) selected @endif>
                                                    {{ $row->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Min Order</label>
                                            <input type="text" name="min_order" value="{{$product_data->min_order}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Seller Review</label>
                                            <input type="text" name="seller_review" value="{{$product_data->seller_review}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Seller Location</label>
                                            <input type="text" name="location" value="{{$product_data->location}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2" name="status">
                                                <option value="">Choose Status</option>
                                                <option @if($product_data->status == "Original") selected @endif> Original  </option>
                                                <option @if($product_data->status == "Copy") selected @endif> Copy  </option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </div>
    <div class="product-footer justify-content-md-center">
        <div class="col-lg-4">

        </div>
        <div class="col-sm-5 col-lg-7 text-right">

            <div class="js-spinner spinner hide btn-primary-reverse onclick mr-1 btn"></div>
            <div class="btn-group hide dropdown">
                <button class="btn btn-primary js-btn-save ml-3" id="add_btn" type="button">
                    <span>Save</span>
                </button><button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenu" data-toggle="dropdown" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <a class="dropdown-item duplicate js-btn-save" href="/admin-dev/index.php/sell/catalog/products/unit/duplicate/20?_token=gdLbJbM_fRZx14T0h5kYuDVLtaTA--xvDhzF9DdPs1I">
                        Duplicate
                    </a>
                    <a class="dropdown-item go-catalog js-btn-save" href="/admin-dev/index.php/sell/catalog/products/last?_token=gdLbJbM_fRZx14T0h5kYuDVLtaTA--xvDhzF9DdPs1I">
                        Go to catalog
                    </a>
                    <a class="dropdown-item new-product js-btn-save" href="/admin-dev/index.php/sell/catalog/products/new?_token=gdLbJbM_fRZx14T0h5kYuDVLtaTA--xvDhzF9DdPs1I">
                        Add new product
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

<script>
    if ($("#myId").length) {
        var myDropzone = new Dropzone("div#myId", {
            addRemoveLinks: true,
            url: "{{ route('products.upload') }}",
            maxFilesize: 2000,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            init: function() {
            },
            success: function (file, response) {
                $('form#add_form').append('<input type="hidden" name="images_name[]" value="' + response + '">')
            }
        });
    }






    $("#add_btn").click(function () {
        $(".error_msg").html('');
        var data = new FormData($('#add_form')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{url("admin/products")}}/"+ $("[name=id]").val(),
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function (responseData) {
            var json_data = JSON.parse(responseData);
            if(json_data.status == 'Success') {
                $("#success_msg").html("Data Update Successfully");
                $("#success_msg").show();

                window.location.href = "{{ url('admin/products')}}";
            }
        }).fail(function (data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function(key, value){
                $("#error_msg").html("<div class='alert alert-default-danger' role='alert'>\
                                        " + value + "\
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>\
                                                <span aria-hidden='true'>&times;</span>\
                                            </button>\
                                        </div>");
            });
        });
    });




</script>
@endsection


