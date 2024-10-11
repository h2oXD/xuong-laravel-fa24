@extends('Admins.layouts.master')
@section('title')
    Danh sách Students
@endsection
@section('content')
    <div class="page-content">
        <div class="page-container">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Chi tiết Students - {{ $student->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header border-bottom border-dashed">
                                    <h4 class="card-title mb-0">Sinh viên: {{ $student->name }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-3 col-6 border-end border-dashed">
                                            <p class="text-muted mb-1">Email</p>
                                            <p class="fs-15 fw-medium mb-3">{{ $student->email }}</p>
                                            <p class="text-muted mb-1">Lớp học</p>
                                            <p class="fs-15 fw-medium mb-0">{{ $student->classroom->name }}</p>
                                        </div>
                                        <div class="col-lg-3 col-6 border-end border-dashed">
                                            <p class="text-muted mb-1">Số hộ chiếu</p>
                                            <p class="fs-15 fw-medium mb-3">{{ $student->passport->passport_number }}</p>
                                            <p class="text-muted mb-1">Ngày cấp hộ chiếu</p>
                                            <p class="fs-15 fw-medium mb-0">{{ $student->passport->issued_date }}</p>
                                            <p class="text-muted mb-1">Ngày hết hạn hộ chiếu</p>
                                            <p class="fs-15 fw-medium mb-0">{{ $student->passport->expiry_date }}</p>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-1">Created At</p>
                                            <p class="fs-15 fw-medium mb-3">{{ $student->created_at }}</p>
                                            <p class="text-muted mb-1">Updated At</p>
                                            <p class="fs-15 fw-medium mb-0">{{ $student->updated_at }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header border-bottom border-dashed">
                                    <h4 class="card-title mb-0">Thông tin môn học</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 border-end border-dashed">
                                            @foreach ($student->subjects as $subject)
                                                <p class="fs-15 fw-medium mb-3">{{ $subject->name }}</p>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
