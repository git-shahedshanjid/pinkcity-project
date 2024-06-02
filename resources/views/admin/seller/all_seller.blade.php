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
            <h4 class="card-title">Seller List</h4>


            <div class="card-tools">
                <a href="{{url('admin/sellers/create')}}" class="btn  btn-info btn-sm" >
                    <i class="fas fa-plus-circle"></i> Add New seller
                </a>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_seller as $row)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <img src="{{ asset("public/seller_images/".$row->image) }}" alt="brand image" style="width: 80px;">
                        </td>
                        <td>
                            {{ $row->name }}
                        </td>


                        <td>

                            <a href=""  class="btn btn-primary btn-sm mr-2 float-left">
                                View
                            </a>




                            <a href="sellers/{{ $row->id }}/edit"  class="btn btn-success btn-sm mr-2 float-left text-white">
                                Edit
                            </a>




                            <form method="post" action="{{ route('sellers.destroy', $row->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure want to delete this?');" type="submit" class="btn btn-danger btn-sm float-left">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
<script type="text/javascript">

    $(document).on('click','.client_status',function(){
        var url = "{{url("change-seller-status")}}";
        var id = $(this).data("id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: url + '/' + id,
            data: id,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function() {
            //window.location.href = "{{ url('sellers')}}";
            // window.location.reload();
        });

        if ($("#active_status_"+id).text() == 'ACTIVE') {
            $("#active_status_"+id).text('INACTIVE');
        }else if($("#active_status_"+id).text() == 'INACTIVE'){
            $("#active_status_"+id).text('ACTIVE');
        }
    });
</script>


@endsection


