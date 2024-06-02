@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Products</h4>


            <div class="card-tools">
                <a href="{{url('admin/products/create')}}" class="btn btn-info btn-md">
                    <i class="fa fa-plus-circle"></i>Add New Product
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
                        <th>Min Order</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $row)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            @if(count($row->product_images))
                            <img src="{{ asset("storage/app/".$row->product_images[0]->images_name) }}" alt="brand image" style="width: 80px;">
                      @endif
                        </td>
                        <td>
                            {{ $row->name }}
                        </td>

                        <td>
                            {{ $row->min_order }}
                        </td>
                        <td>
                            {{ $row->status }}
                        </td>
                        <td>

                            <a href=""  class="btn btn-primary btn-sm mr-2 float-left">
                                View
                            </a>




                            <a href="products/{{ $row->id }}/edit"  class="btn btn-success btn-sm mr-2 float-left text-white">
                                Edit
                            </a>




                            <form method="post" action="{{ route('products.destroy', $row->id) }}" style="display: inline-block;">
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


@endsection


