@extends('layouts.master')

@section('content')

<style>
    span.select2.select2-container.select2-container--default{
        width: 450px !important;
    }
    .hide{
        display: none;
    }
    #valid-msg{
        color: green;
    }
    #error-msg{
        color: red;
    }
</style>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit seller Info</h4>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="edit_form" autocomplete="off">
                <div class="form-row">

                    @method('PUT')

                    <!--                    <div class="form-group col-md-6">
                                            <label for="Type">Type</label>
                                            <select class="form-control" name="seller_type" id="type">
                                                <option value="">Select seller Type</option>


                                            </select>
                                        </div>-->

                    <div class="form-group col-md-6">
                        <label for="seller_first_name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$seller_info->name}}" id="name" placeholder="seller Name">
                        <input type="hidden" class="form-control" name="id" value="{{$seller_info->id}}" id="id" placeholder="seller Name">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="seller_postal_code">Image*</label>
                        <input type="file" class="form-control" name="image">
                    </div>




                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" name="password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confirm_password">Confirm Password</label>
                        <input id="confirm_password" class="form-control" name="confirm_password">
                    </div>


                </div>


                <button type="button" id="edit_btn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div>

<script>



    $("#edit_btn").click(function () {

        var url = "{{url("admin/sellers")}}"
        var id = $('[name=id]').val();
        $(".error_msg").html('');
        var data = new FormData($('#edit_form')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: url + '/' + id,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            window.location.href = "{{ url('admin/sellers')}}";
            //window.location.reload();
        }).fail(function (data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function (key, value) {
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
    });



</script>


@endsection


