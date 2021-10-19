@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="float-left">Member Management</h2>
        <a href="{{route('member.create')}}" class="btn btn-primary float-right" type="submit">Create New Member</a>
    </div>

</div>
    <div class="row">

        <div class="col-md-12">

            <table class="table table-striped mt-2">
                <thead>
                    <tr>

                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if (!empty($users))
                        @foreach ($users as $key => $user)
                            <tr id="row_{{$user->id}}">


                                <td>{{ isset($user->profile->first_name) ? $user->profile->first_name : '' }}</td>
                                <td>{{ isset($user->profile->last_name) ? $user->profile->last_name : '' }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a id="memberEditBtn" href="javascript:void(0)" data-id="{{$user->id}}"
                                        data-url="{{ route('member.edit', $user->id) }}" onclick="editUser(event.target)"
                                        class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal">Edit</a>


                                        <a href="#" data-id="{{$user->id}}" class="btn btn-sm btn-danger" data-url="{{ route('member.destroy', $user->id) }}"  onclick="deleteUser(event.target)">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                              <div class="text-center">
                                No Data Available
                              </div>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection


@if (!empty($users))
    @section('modal')
        @include('member.modals.memberModal')
    @endsection


    @section('ajaxScript')
        @include('ajax.member');
    @endsection
@endif
