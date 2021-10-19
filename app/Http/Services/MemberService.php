<?php

namespace App\Http\Services;

use App\Http\Traits\SendResponseTrait;
use App\User;
use Illuminate\Support\Facades\Hash;

class MemberService
{

    public function addMember($memberData){
        $user = User::create([
            'email' => $memberData['email'],
            'password' => Hash::make($memberData['password'])
        ]);

        $user->profile()->create([
            'first_name' => $memberData['firstName'],
            'last_name' => $memberData['lastName'],
            'dob' =>$memberData['dob'],
            'gender' => $memberData['gender'],
            'contact_no' => $memberData['contactNo'],

        ]);

        return true;


    }

    public function getMemberDetails($memberId){
      return  User::with('profile')->findOrFail($memberId);
    }

    public function updateMember($memberData,$memberId){

        try {


        $user = User::find($memberId);


        if(!empty($memberData['password'])){
            $user->update([
                'email'=>$memberData['email'],
                'password'=> Hash::make($memberData['password'])
            ]);
        }else{
            $user->update([
                'email'=>$memberData['email'],
            ]);
        }


        $user->profile()->update([
            'first_name' => $memberData['firstName'],
            'last_name' => $memberData['lastName'],
            'dob' => $memberData['dob'],
            'gender' => $memberData['gender'],
            'contact_no' => $memberData['contactNo'],

        ]);
        return true;

        }catch (\Exception $exception){
                return false;
        }

    }

    public function deleteMember($memberId){

        $user  =User::find($memberId);
        if ($user){
            $user->delete();
            return true;

        }else{
           return false;
        }

    }
}
