<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;

use App\Http\Traits\SendResponseTrait;
use App\User;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{

    use SendResponseTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('profile')->paginate(10);

        return view('member.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        $user->profile()->create([
            'first_name' => $request->get('firstName'),
            'last_name' => $request->get('lastName'),
            'dob' => $request->get('dob'),
            'gender' => $request->get('gender'),
            'contact_no' => $request->get('contactNo'),

        ]);


        SendResponseTrait::sendSuccess('Member Created successfully',200);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('profile')->findOrFail($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {


          $user = User::find($id);


         if(!empty($request->get('password'))){
             $user->update([
                 'email'=>$request->get('email'),
                 'password'=> Hash::make($request->get('password'))
             ]);
         }else{
             $user->update([
                 'email'=>$request->get('email'),
             ]);
         }


        $user->profile()->update([
            'first_name' => $request->get('firstName'),
            'last_name' => $request->get('lastName'),
            'dob' => $request->get('dob'),
            'gender' => $request->get('gender'),
            'contact_no' => $request->get('contactNo'),

        ]);



        $result = [
            'status' => true,
            'message' => 'User Created successfully',

        ];
        SendResponseTrait::sendSuccess('Member Profile Updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (User::find($id)){
            return  User::find($id)->delete();
            SendResponseTrait::sendSuccess('Member Profile Deleted successfully',200);
        }else{
            SendResponseTrait::sendSuccess('Member Profile Deleted successfully',200);
        }

    }
}
