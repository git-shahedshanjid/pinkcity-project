<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all_users'] = User::all();
        return view("admin.users.all_users", $data);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_list(Request $request) {
        $draw = intval($request->draw);
        $start = intval($request->start);
        $limit = intval($request->length);
        $sortBy = null;
        $sortDirection = '';

        if(isset($request->order[0]['column'])){
            $sortBy = $request->columns[$request->order[0]['column']]['data'];
            $sortDirection = $request->order[0]['dir'];
        }

        $total_data = DB::table('users')
                            ->when($sortBy, function ($query, $sortBy) use($sortDirection) {
                                return $query->orderBy($sortBy, $sortDirection);
                            }, function ($query) {
                                return $query->orderBy('id', 'desc');
                            })
//                            ->when($filterList, function ($query, $filterList) use ($columns) {
//                                foreach($filterList as $key => $val) {
//                                    return $query->where($columns[$key]['name'], 'like', "%".$val[0]."%");
//                                }
//                            })
                            ->count();

        $user_list = DB::table('users')
                            ->when($sortBy, function ($query, $sortBy) use($sortDirection) {
                                return $query->orderBy($sortBy, $sortDirection);
                            }, function ($query) {
                                return $query->orderBy('id', 'desc');
                            })
                            ->select("users.*")
//                            ->when($filterList, function ($query, $filterList) use ($columns) {
//                                foreach($filterList as $key => $val) {
//                                    return $query->where($columns[$key]['name'], 'like', "%".$val[0]."%");
//                                }
//                            })
                            ->offset($start)
                            ->limit($limit)
                            ->get();
//        echo '<pre>';print_r($user_list);die;
        $data = array();
        $i = 1;

        $user = Auth::user();
        $user->can('add-vendor');

        foreach($user_list as $row) {
            $action = '';
            $message = 'Are You Sure want to delete';
            $action.= "<a class='btn btn-primary btn-sm mr-2' href='users/".$row->id."'>View</a>";
            $action.= "<a class='btn btn-success btn-sm mr-2' href='users/".$row->id."/edit'>Edit</a>";
            $action.= "<form action='".route('users.destroy', $row->id)."' method='POST' style='display: inline-block;'>"
                            .csrf_field().""
                            .method_field('DELETE')."
                            <button class='btn btn-danger btn-sm' type='submit'>Delete</button>
                        </form>";

            $user_array['sl'] = $i;
            $user_array['name'] = $row->name;
            $user_array['email'] = $row->email;
            $user_array['action'] = $action;

            $data[] = $user_array;
            $i++;
        }

        $output = array(
                    "draw" => $draw,
                    "recordsTotal" => $total_data,
                    "recordsFiltered" => $total_data,
                    "data" => $data
                );
        echo json_encode($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = Role::all();
        return view("admin.users.add_user",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'email'             => 'required',
            'password'          => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password'  => 'min:6'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['roles'] = Role::all();
        $data['user_data'] = DB::table('users')
                                ->where('users.id', $id)
                                ->select('users.*')
                                ->first();
//        echo '<pre>';print_r($data);die;
        return view("admin.users.edit_user", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required',
            'email'             => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/users');
    }
}
