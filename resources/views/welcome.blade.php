@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('msg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('msg') }}
                            </div>
                        @endif
                    <h1>Đây là trang chủ</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
