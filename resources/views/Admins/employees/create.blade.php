@extends('Admins.layouts.master')
@section('title')
    Thêm mới employees
@endsection
@section('content')
    <div class="page-content">
        <div class="page-container">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Thêm mới employee</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label" for="">First Name</label>
                                        <input class="form-control" type="text" name="first_name" id=""
                                            value="{{ old('first_name') }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" id=""
                                            value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-label" for="">Email</label>
                                        <input class="form-control" type="email" name="email" id=""
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="">Phone</label>
                                        <input class="form-control" type="text" name="phone" id=""
                                            value="{{ old('phone') }}">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="">Address</label>
                                        <input class="form-control" type="text" name="address" id=""
                                            value="{{ old('address') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-label" for="">Date of birth</label>
                                        <input class="form-control" type="date" name="date_of_birth" id=""
                                            value="{{ old('date_of_birth') }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="">Hire date</label>
                                        <input class="form-control" type="date" name="hire_date" id=""
                                            value="{{ old('hire_date') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-label" for="">Salary</label>
                                        <input class="form-control" type="number" min="0" name="salary"
                                            value="{{ old('salary') }}" id="">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="">Profile picture</label>
                                        <input class="form-control" type="file" name="profile_picture" id="">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label class="form-label" for="">Department ID</label>
                                        <input class="form-control" type="number" min="0" name="department_id"
                                            value="{{ old('department_id') }}" id="">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="">Manager ID</label><br>
                                        <input class="form-control" type="number" min="0" name="manager_id"
                                            value="{{ old('manager_id') }}" id="">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label" for="">Is Active</label><br>
                                        <input type="checkbox" name="is_active" id="switch3" checked value="1"
                                            data-switch="success">
                                        <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="col-3 text-center d-flex align-items-center flex-row-reverse">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
