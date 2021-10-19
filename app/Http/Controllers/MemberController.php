<?php

namespace App\Http\Controllers;

use App\Http\Facades\MemberFacade;
use App\Http\Requests\MemberRequest;
use App\Http\Traits\SendResponseTrait;
use App\User;



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
        $userData = $request->all();
        if (MemberFacade::addMember($userData)){
           return SendResponseTrait::sendSuccess('Member Created successfully',200);
        }else{
           return SendResponseTrait::sendError('Member Created successfully',200);
        }


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
        $user = MemberFacade::getMemberDetails($id);

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

        if (MemberFacade::updateMember($request->all(),$id)){
           return SendResponseTrait::sendSuccess('Member Profile Updated successfully',200);
        }else{
            return SendResponseTrait::sendError('Member Profile Updated Error',422);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (MemberFacade::deleteMember($id)){
            return SendResponseTrait::sendSuccess('Member Profile Deleted successfully',200);
        }else{
            return SendResponseTrait::sendError('Member Profile Deletion Error',422);
        }
    }
}
