@extends('Admins.layouts.master')
@section('title')
    Danh sách classrooms
@endsection
@section('content')
    <div class="page-content">
        <div class="page-container">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Danh sách classrooms</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                <a class="btn btn-primary" href="{{ route('classrooms.create') }}">Thêm mới</a>
                            </p>
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
                            <div class="table-responsive-sm">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>teacher_name</th>
                                            <th class="text-center" colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classrooms as $classroom)
                                            <tr>
                                                <td>{{ $classroom->id }}</td>
                                                <td>{{ $classroom->name }}</td>
                                                <td>{{ $classroom->teacher_name }}</td>
                                                <td class="text-center text-muted">
                                                    <a title="Chi tiết" href="{{ route('classrooms.show', $classroom) }}"
                                                        class="link-reset fs-20 p-1"><i class="ti ti-info-circle"></i></a>
                                                </td>
                                                <td class="text-center text-muted">
                                                    <a title="Chỉnh sửa" href="{{ route('classrooms.edit', $classroom) }}"
                                                        class="link-reset fs-20 p-1"><i class="ti ti-pencil"></i></a>
                                                </td>
                                                <td class="text-center text-muted">
                                                    <form method="POST"
                                                        action="{{ route('classrooms.destroy', $classroom) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button title="Xoá mềm"
                                                            onclick="return confirm('Bạn có chắc muốn xoá?')" type="submit"
                                                            class="btn link-reset fs-20 p-1"><i
                                                                class="ti ti-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div>
    </div>
@endsection
