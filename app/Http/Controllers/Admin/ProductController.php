<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\File;
use Auth;
use DB;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['all_product'] = Product::all();
        // echo '<pre>';print_r($data['all_product']);
        return view('admin.product.all_product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['all_seller'] = Seller::all();
        return view('admin.product.add_product', $data);
    }

    /**
     * Build Category List
     *
     * @param  parent_id and $category[]
     * @return Category List
     */


    /**
     * Upload a newly created file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return File Path
     */
    public function upload(Request $request) {

//        echo '<pre>';print_r($request->file('file'));die;
        $upload_folder = 'products';

        $path = $request->file('file')->storeAs($upload_folder, $request->file('file')->getClientOriginalName());

        return $path;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $product = new Product;

        $request->validate([
            'name' => 'required|unique:products',
            'seller' => 'required',
            'min_order' => 'required'
        ]);

        $response['status'] = 'Error';

        $product->name = $request->name;
        $product->seller = $request->seller;
        $product->min_order = $request->min_order;
        $product->serial_no = $request->serial;
        $product->seller_review = $request->seller_review;
        $product->location = $request->seller_location;
        $product->status = $request->status;

        $product->save();

        $data_image = array();
        $i = 0;
        if ($request->images_name) {
            foreach ($request->images_name as $row) {
                $data_image['product_id'] = $product->id;
                $data_image['images_name'] = $row;
                $data_image['is_main_image'] = 0;
                if ($i == 0) {
                    $data_image['is_main_image'] = 1;
                }

                DB::table('products_images')->insert($data_image);
            }
        }

        if (isset($product->id)) {
            $response['status'] = 'Success';
        }

        echo json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['product_data'] = Product::find($id);
        $data['all_seller'] = Seller::all();
        return view('admin.product.edit_product', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {


        $request->validate([
            'name' => 'required',
            'seller' => 'required'
        ]);

        $product = Product::find($id);

        // echo 1;die;

        $response['status'] = 'Error';

        $product->name = $request->name;
        $product->seller = $request->seller;
        $product->min_order = $request->min_order;
        $product->serial_no = $request->serial;
        $product->seller_review = $request->seller_review;
        $product->location = $request->location;
        $product->status = $request->status;

        $product->save();




        $data_image = array();
        $i = 0;

        if ($request->images_name) {
            // $previous_images = DB::table('products_images')->where('product_id', $product->id)->get();
            // foreach ($previous_images as $rowImage) {
            //     if (File::exists('storage/app/category/' . $rowImage->images_name)) {
            //         File::delete('storage/app/category/' . $rowImage->images_name);
            //     }
            // }
            DB::table('products_images')->where('product_id', $product->id)->delete();
            foreach ($request->images_name as $row) {
                $data_image['product_id'] = $product->id;
                $data_image['images_name'] = $row;
                $data_image['is_main_image'] = 0;
                if ($i == 0) {
                    $data_image['is_main_image'] = 1;
                }
                DB::table('products_images')->insert($data_image);
            }
        }

        if (isset($product->id)) {
            $response['status'] = 'Success';
        }

        echo json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/products');
    }



}
