<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $projects = Project::latest()->paginate(5);
            if (!$projects) {
                return response()->json([
                    'massage' => 'Không có dữ liệu',
                ], 404);
            }
            return response()->json([
                'data' => $projects,
                'massage' => 'Lấy dữ liệu thành công',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'massage' => 'Lỗi hệ thống',
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $data = $request->all();
            $data['start_date'] = Carbon::parse($request->start_date)->format('Y-m-d');
            $project = Project::create($data);
            return response()->json([
                'data' => $project,
                'massage' => 'Thêm mới thành công',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'massage' => 'Lỗi hệ thống',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $project = Project::find($id);
            if (!$project) {
                return response()->json([
                    'massage' => 'Không có dữ liệu',
                ], 404);
            }
            return response()->json([
                'data' => $project,
                'massage' => 'Lấy dữ liệu thành công',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'massage' => 'Lỗi hệ thống',
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();
            $data['start_date'] = Carbon::parse($request->start_date)->format('Y-m-d');
            $project = Project::find($id)->update($data);
            return response()->json([
                'data' => $project,
                'massage' => 'Cập nhật thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'massage' => 'Lỗi hệ thống',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Project::find($id)->delete();
            return response()->json([
                'massage' => 'Xoá thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'massage' => 'Xoá không thành công',
            ], 500);
        }
    }
}
