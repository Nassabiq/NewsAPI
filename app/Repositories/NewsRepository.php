<?php

namespace App\Repositories;

use Traits\ApiResponse;
use App\Http\Resources\NewsResource;
use App\Interfaces\NewsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class NewsRepository implements NewsRepositoryInterface
{
    // use ApiResponse;

    public function getAll()
    {
        $data = NewsResource::collection(DB::table('news')->paginate(5));

        return response()->json([
            "messages" => 'News Data',
            "data" => $data,
            "status" => 200,
        ], 200);
    }

    public function getById(int $id)
    {
        $data = new NewsResource(DB::table('news')->where('id', $id)->first());

        return response()->json([
            "messages" => 'News Data with id ' . $id,
            "data" => $data,
            "status" => 200,
        ], 200);
    }

    public function storeNews(array $data)
    {
        DB::table('news')->insert($data);

        return response()->json([
            'messages' => 'Data Berhasil Ditambahkan',
            'data' => $data,
            'status' => 201
        ], 201);
    }

    public function updateNews(array $data, int $id)
    {
        $query = DB::table('news')->where('id', $id)->update($data);
        $data = new NewsResource($query);

        return response()->json([
            'messages' => 'Data Berhasil Diubah',
            'data' => $data,
            'status' => 200
        ], 200);
    }

    public function deleteNews(int $id)
    {
        DB::table('news')->where('id', $id)->delete();

        return response()->json([
            'messages' => 'Data Berhasil Dihapus',
            'status' => 200
        ], 200);
    }
}
