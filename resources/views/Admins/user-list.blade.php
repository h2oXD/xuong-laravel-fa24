@extends('Admins.layouts.master')
@section('title')
    Danh sách user
@endsection
@section('content')
    <div class="page-content">
        <table>
            <tr>
                <th>USER ID</th>
                <th>PHONE</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->phone->value}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
