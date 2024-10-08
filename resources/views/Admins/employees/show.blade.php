@extends('Admins.layouts.master')
@section('title')
    Thêm mới employees
@endsection
@section('content')
    <div class="page-content">
        <div class="page-container">

            <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold mb-0">Chi tiết Employee - {{ $employee->first_name }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ Storage::url($employee->profile_picture) }}" alt=""
                                    class="avatar-xl rounded-circle border border-light border-2">
                                <div>
                                    <h4 class="text-dark fw-medium">{{ $employee->first_name }} {{ $employee->last_name }}
                                    </h4>
                                </div>
                                <div class="ms-auto">
                                    @if ($employee->is_active)
                                        <span class="badge bg-success px-2 py-1 fs-12">Active</span>
                                    @else
                                        <span class="badge bg-danger px-2 py-1 fs-12">Inactive</span>
                                    @endif
                                </div>

                            </div>
                            <div class="mt-3">
                                <h4 class="fs-15">Contact Details :</h4>
                                <div class="mt-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:point-on-map-bold-duotone"
                                                class="fs-20 text-primary"></iconify-icon>
                                        </div>
                                        <p class="mb-0 text-dark">{{ $employee->address }}</p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:smartphone-2-bold-duotone"
                                                class="fs-20 text-primary"></iconify-icon>
                                        </div>
                                        <p class="mb-0 text-dark">{{ $employee->phone }}</p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:letter-bold-duotone"
                                                class="fs-20 text-primary"></iconify-icon>
                                        </div>
                                        <p class="mb-0 text-dark">{{ $employee->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed">
                            <h4 class="card-title mb-0">Thông tin chi tiết</h4>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-lg-3 col-6 border-end border-dashed">
                                    <p class="text-muted mb-1">Ngày sinh</p>
                                    <p class="fs-15 fw-medium mb-3">{{ $employee->date_of_birth}}</p>
                                    <p class="text-muted mb-1">Ngày tham gia</p>
                                    <p class="fs-15 fw-medium mb-0">{{ $employee->hire_date}}</p>
                                </div>
                                <div class="col-lg-3 col-6 border-end border-dashed">
                                    <p class="text-muted mb-1">Số điện thoại</p>
                                    <p class="fs-15 fw-medium mb-3">{{ $employee->phone}}</p>
                                    <p class="text-muted mb-1">Địa chỉ</p>
                                    <p class="fs-15 fw-medium mb-0">{{ $employee->address}}</p>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-1">Department</p>
                                    <p class="fs-15 fw-medium mb-3">{{ $employee->department_id}}</p>
                                    <p class="text-muted mb-1">Manager</p>
                                    <p class="fs-15 fw-medium mb-0">{{ $employee->manager_id}}</p>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-1">Created AT</p>
                                    <p class="fs-15 fw-medium mb-3">{{ $employee->created_at}}</p>
                                    <p class="text-muted mb-1">Updated AT</p>
                                    <p class="fs-15 fw-medium mb-0">{{ $employee->updated_at}}</p>
                                </div>
                            </div>
                            <hr class="my-3">
                            <h4 class="mb-0 fs-15 fw-semibold">Salary</h4>
                            <div class="row mt-2 g-2">
                                <div class="col-lg-2 col-6">
                                    <h4 class="fw-medium">{{ $employee->salary}}$</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
