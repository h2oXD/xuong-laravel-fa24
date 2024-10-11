@extends('Admins.layouts.master')
@section('title')
    Danh sách subjects
@endsection
@section('content')
    <div class="page-content">
        <div class="page-container">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Danh sách subjects</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                <a class="btn btn-primary" href="{{ route('subjects.create') }}">Thêm mới</a>
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
                                            <th>credits</th>
                                            <th class="text-center" colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->id }}</td>
                                                <td>{{ $subject->name }}</td>
                                                <td>{{ $subject->credits }}</td>
                                                <td class="text-center text-muted">
                                                    <a title="Chi tiết" href="{{ route('subjects.show', $subject) }}"
                                                        class="link-reset fs-20 p-1"><i class="ti ti-info-circle"></i></a>
                                                </td>
                                                <td class="text-center text-muted">
                                                    <a title="Chỉnh sửa" href="{{ route('subjects.edit', $subject) }}"
                                                        class="link-reset fs-20 p-1"><i class="ti ti-pencil"></i></a>
                                                </td>
                                                <td class="text-center text-muted">
                                                    <form method="POST"
                                                        action="{{ route('subjects.destroy', $subject) }}">
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
