@extends('Admins.layouts.master')
@section('title')
    Cập nhật student
@endsection
@section('content')
    <form action="{{ route('students.update', $student) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="page-content">
            <div class="page-container">
                <div class="row">
                    <div class="border-bottom border-dashed d-flex align-items-center mt-3">
                        <h4 class="header-title">Cập nhật student</h4>
                    </div>

                    <div class="col-8 mt-3">
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
                            @if (session()->has('success') && !session()->get('success'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            @if (session()->has('success') && session()->get('success'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Thao tác thành công</strong>
                                </div>
                            @endif
                            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                                <h4 class="header-title">Thêm mới student</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label" for="">Tên sinh viên</label>
                                        <input class="form-control" type="text" placeholder="Nhập tên sinh viên"
                                            name="name" id="" value="{{ $student->name }}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label class="form-label" for="">Email</label>
                                        <input class="form-control" type="email" placeholder="Nhập email" name="email"
                                            id="" value="{{ $student->email }}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label class="form-label" for="">Lớp học</label>
                                        <select class="form-select" name="classroom_id" id="">
                                            <option value="">-Chọn-lớp-học-</option>
                                            @foreach ($classrooms as $classroom)
                                                <option @selected($classroom->id == $student->classroom_id) value="{{ $classroom->id }}">
                                                    {{ $classroom->name }}(Giáo
                                                    Viên:{{ $classroom->teacher_name }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                                <h4 class="header-title">Thông tin môn học</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label" for="">Thêm môn họcc</label>
                                        <select class="form-select" name="subjects[]" multiple id="">
                                            @foreach ($subjects as $subject)
                                                <option @selected($student->subjects->pluck('id')->contains($subject->id)) value="{{ $subject->id }}">
                                                    {{ $subject->name }}({{ $subject->credits }} Tín)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                                <h4 class="header-title">Thông tin hộ chiếu</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label" for="">Số hộ chiếu</label>
                                        <input class="form-control" type="text" placeholder="Nhập số hộ chiếu"
                                            name="passport_number" id=""
                                            value="{{ $student->passport->passport_number }}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label class="form-label" for="">Ngày cấp hộ chiếu</label>
                                        <input class="form-control" type="date" name="issued_date" id=""
                                            value="{{ $student->passport->issued_date }}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label class="form-label" for="">Ngày hết hạn hộ chiếu</label>
                                        <input class="form-control" type="date" name="expiry_date" id=""
                                            value="{{ $student->passport->expiry_date }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                                <h4 class="header-title">Thao tác</h4>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Cập nhật sinh viên</button>
                                <a href="{{ route('students.index') }}" class="btn btn-danger">Danh sách sinh viên</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
