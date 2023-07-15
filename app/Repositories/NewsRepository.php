<?php

namespace App\Repositories;

use App\Models\News;
use App\Http\Resources\NewsResource;
use App\Interfaces\NewsRepositoryInterface;
use App\Traits\ApiResponse;
use App\Traits\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsRepository implements NewsRepositoryInterface
{
    use ApiResponse, ActivityLog;

    protected $user;
    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function getAll()
    {
        $data = NewsResource::collection(News::paginate(5))->response()->getData(true);
        return $this->successResponse("News Data", $data, 200);
    }

    public function getById(int $id)
    {
        $query = News::with('comments')->find($id);

        if (!is_null($query)) {
            $data = new NewsResource($query);
            return $this->successResponse(`News Data with id {$id}`, $data, 200);
        }

        return $this->failedResponse('Data Tidak Ditemukan', 400);
    }

    public function storeNews(array $data)
    {
        DB::beginTransaction();
        try {
            $query = News::create($data);
            $result = new NewsResource($query);

            $this->writeLog(
                'Storing Data',
                "User with id {$this->user->id} dan name {$this->user->name} Inserted News Data",
                $this->user->id
            );

            DB::commit();
            return $this->successResponse("Data Berhasil Ditambahkan", $result, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->failedResponse("Data Tidak Berhasil Ditambahkan", 400);
        }
    }

    public function updateNews(array $data, int $id)
    {
        $query = News::find($id);

        if (!is_null($query)) {
            DB::beginTransaction();
            try {
                $query->update($data);
                $result = new NewsResource($query);

                $this->writeLog(
                    'Updating Data',
                    "User with id {$this->user->id} name {$this->user->name} Updated News Data",
                    $this->user->id
                );

                DB::commit();
                return $this->successResponse("Data Berhasil Diubah", $result, 200);
            } catch (\Throwable $th) {
                DB::rollback();
                return $this->failedResponse("Data Tidak Berhasil Diubah", 400);
            }
        }

        return $this->failedResponse('Data Tidak Ditemukan', 400);
    }

    public function deleteNews(int $id)
    {
        $data = News::find($id);

        if (!is_null($data)) {
            DB::beginTransaction();
            try {
                $data->delete();
                $this->writeLog(
                    'Deleting Data',
                    "User with id {$this->user->id} name {$this->user->name} Deleted News Data",
                    $this->user->id
                );

                DB::commit();
                return $this->successResponse("Data Berhasil Dihapus", null, 200);
            } catch (\Throwable $th) {
                DB::rollback();
                return $this->failedResponse("Data Tidak Berhasil Dihapus", 400);
            }
        }
        return $this->failedResponse('Data Tidak Ditemukan', 400);
    }

    public function comments()
    {
    }
}
