@extends('layouts.master')

@section('content')

<style>
    span.select2.select2-container.select2-container--default{
        width: 450px !important;
    }
</style>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">User Info</h4>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="add_form">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Name">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Role</label>
                        <select class="form-control select2" name="role">
                            <option value="">Choose Role</option>
                            @foreach($roles as $row)
                            <option value="{{ $row->id }}">
                                {{ $row->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Name">Password</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Enter Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Name">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    </div>

                </div>

                <button type="button" id="add_btn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


</div>

<script>

    $("#add_btn").click(function (){

        $(".error_msg").html('');
        var data = new FormData($('#add_form')[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{url("admin/users")}}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function() {
            $("#success_msg").html("Data Save Successfully");
             window.location.href = "{{ url('admin/roles')}}";
            // location.reload();
        }).fail(function(data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function(key, value){
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
    });
  </script>


@endsection


