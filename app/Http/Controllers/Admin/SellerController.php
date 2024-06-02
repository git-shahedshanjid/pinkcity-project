<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Seller;
use Auth;
use DB;

class SellerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data['all_seller'] = Seller::all();
        return view("admin.seller.all_seller", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $data['seller_id'] = 'clt#5548564';
        return view("admin.seller.add_seller", $data);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  Country ID
     * @return \Illuminate\Http\Response states list
     */
    public function get_states($id) {
        return get_state($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validationArray['name'] = 'required';
        $validationArray['image'] = 'required';
        $validationArray['password'] = 'min:6|required_with:confirm_password';
        $validationArray['confirm_password'] = 'min:6|required|same:password';


        $this->validate($request, $validationArray);
        $data['name'] = $request->input('name');

        $imageName = time().'.'.$request->image->extension();



        $request->image->move(public_path('seller_images'), $imageName);

        $data['image'] = $imageName;

        $data['password'] = \Illuminate\Support\Facades\Hash::make($request->input('password'));

        Seller::insert($data);
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
        $data['seller_info'] = Seller::find($id);

        return view("admin.seller.edit_seller", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {


        $validationArray['name'] = 'required';

        if ($request->password != null) {
            $validationArray['password'] = 'min:6|required_with:confirm_password';
            $validationArray['confirm_password'] = 'min:6|required|same:password';
        }

        $this->validate($request, $validationArray);


        if ($request->password != null) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->input('password'));
        }

       $data['name'] = $request->input('name');
       if ($request->hasFile('image')) {

$imageName = time().'.'.$request->image->extension();



$request->image->move(public_path('seller_images'), $imageName);

$data['image'] = $imageName;

       }


        Seller::updatesellerData($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {


        $seller = seller::find($id);
        $seller->delete();
        return redirect('admin/sellers');
    }



}
