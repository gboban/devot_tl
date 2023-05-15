<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Timesheet;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * Display users and user add form.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::all();
        return view('admin_users', compact('users'));
    }

    /**
     * Delete user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete_user(Request $request)
    {
        $user = User::find($request->all()['id']);
        $user->delete();

        return redirect('/admin/users');
    }

    /**
     * Create new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_user(Request $request)
    {
        $user = User::create(array_merge($request->all(), ['password'=>Hash::make(md5(random_bytes(20)))]));

        return redirect('/admin/users');
    }

    /**
     * Display timesheets.
     *
     * @param  \Illuminate\Http\Request  $request - start/end date
     * @return \Illuminate\Http\Response
     */
    public function timesheets(Request $request)
    {
        $timesheets = Timesheet::all();

        // filter data
        $request_data = $request->all();
        if(!empty($request_data['start'])){
            $timesheets = $timesheets->where('start', '>=', $request_data['start']);
        }
        if(!empty($request_data['end'])){
            $timesheets = $timesheets->where('end', '<=', $request_data['end']);
        }

        return view('admin_timesheets', compact('timesheets'));
    }
}
