<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Seller;
use Session;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data['all_seller'] = Seller::all();
        $data['slider_product'] = Product::inRandomOrder()->latest()->take(60)->get();
    //    echo '<pre>';
    //    print_r($data['slider_product']);die;
        return view('frontend/home_content', $data);
    }

    public function category_product($param) {
        $data = array();
        $data['all_brand'] = Brand::all();
        $data['category_info'] = Category::where('slug', $param)->first();

        if ($data['category_info']) {
            $data['category_products'] = Product::whereIn("id", function ($query) use ($data) {
                        $query->select('product_id')
                                ->from('products_categories')
                                ->where('category_id', $data['category_info']->id);
                    })->get();

            $attributes = Attribute::with(['attribute_group'])->whereHas('products.categories', function($q) use ($data) {
                        $q->where('category_id', $data['category_info']->id);
                    })->get();

            $max_val = 0;
            foreach ($data['category_products'] as $row) {
                if ($max_val < $row->price) {
                    $max_val = $row->price;
                }
            }

            $attribute_array = array();
            foreach ($attributes as $attribute) {
                $attribute_array[$attribute->attribute_group->attribute_group_name][] = $attribute;
            }

            $data['price_max_val'] = $max_val;
            $data['products_attributes'] = $attribute_array;

            return view('frontend/category/category_wise_product_list', $data);
        } else {
            return view('frontend/404_page', $data);
        }
    }

    public function user_registration() {
        return view('frontend/user_account/user_registration');
    }

    public function pre_order() {
        return view('frontend/pre_order/add');
    }

    public function submit_pre_order(Request $request) {
       $pre_order = new PreOrder;

       $request->validate([
        'phone' => 'required'
    ]);
    $pre_order->phone_number = $request->phone;
    $pre_order->email = $request->email;
    $pre_order->customer_id = Session::get('user_id');
    $pre_order->link = $request->url;

    $pre_order->save();

    if ($request->images) {
        foreach ($request->images as $row) {

    $upload_folder = 'pre_orders';

    $path = $row->storeAs($upload_folder, $row->getClientOriginalName());

            $data_image['pre_order_id'] = $pre_order->id;
            $data_image['image_file'] = $path;
            //$product->attributes()->attach($data_attribute);
            DB::table('pre_order_images')->insert($data_image);
        }
    }



    }





    public function store_registration(Request $request) {
        $customer_info = New Customer;

        $request->validate([
            'customer_first_name' => 'required',
            'customer_last_name' => 'required',
            'customer_email' => 'required|unique:customers|email',
            'customer_phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'password' => 'required|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
        ]);

        if (Customer::all()->last()) {
            $last_customer_info = Customer::all()->last();
            $last_id = $last_customer_info->id;
        } else {
            $last_id = 0;
        }

        $customer_info->customer_code = "CST-100" . ($last_id + 1);

        $customer_info->customer_first_name = $request->customer_first_name;
        $customer_info->customer_last_name = $request->customer_last_name;
        $customer_info->customer_email = $request->customer_email;
        $customer_info->customer_phone = $request->customer_phone;
        $customer_info->country_id = $request->country_id;
        $customer_info->country_name = $request->country_name;
        $customer_info->state_id = $request->state_id;
        $customer_info->state_name = $request->state_name;
        $customer_info->customer_postal_code = $request->customer_postal_code;
        $customer_info->customer_address = $request->customer_address;
        $customer_info->customer_status = 'ACTIVE';
        $customer_info->password = Hash::make($request->password);

        if ($customer_info->save()) {

            \Session::put('user_id', $customer_info->id);
            \Session::put('customer_email', $customer_info->customer_email);

            return $result = array("status" => "ok", "message" => "ok");
        } else {
            return $result = array("status" => "ok", "message" => "Registration Fail");
        }
    }

    public function user_login() {
        return view('frontend/user_account/user_login');
    }

    public function company_info() {
        return company_info();
    }

    public function user_login_check(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $login_info = Customer::where('customer_email', $request->email)->first();


        if ($login_info) {
            if (Hash::check($request->password, $login_info->password)) {
                \Session::put('user_id', $login_info->id);
                \Session::put('customer_email', $login_info->customer_email);

                return $result = array("status" => "ok", "message" => "ok");
            } else {
                return $result = array("status" => "not_ok", "message" => "Invalid Password");
            }
        } else {
            return $result = array("status" => "not_ok", "message" => "Unregisterd User");
        }
        // echo "<pre>";print_r($login_info->password);die();
    }

    public function product_details($slug) {
        $data['product_data'] = Product::where('slug', $slug)->get();
        if (isset($data['product_data'][0]->attributes[0]->attribute_group_id)) {
            $attributes = Attribute::with(['attribute_group'])->whereHas('products.attributes', function($q) use ($data) {
                        $q->where('attribute_group_id', $data['product_data'][0]->attributes[0]->attribute_group_id);
                    })->get();

            $attribute_array = array();
            foreach ($attributes as $attribute) {
                $group_name = $attribute['attribute_group']['attribute_group_name'];
                $attribute_array[$group_name][] = $attribute;
            }
            $data['products_attributes'] = $attribute_array;
        }
//        $data['related_products']= Category::find($data['product_data'][0]->main_category);
        $data['related_products']= Product::whereIn("id", function ($query) use ($data) {
                        $query->select('product_id')
                                ->from('products_categories')
                                ->where('category_id', $data['product_data'][0]->main_category);
                    })->get();
                    $data['all_brand'] = Brand::all();
//        echo "<pre>";
//        print_r($data['related_products']);
//        die();
        return view('frontend.product.product_details', $data);
    }

}
