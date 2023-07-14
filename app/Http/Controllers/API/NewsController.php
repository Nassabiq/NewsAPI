<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Interfaces\NewsRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    protected $newsSenewsRepositoryInterfacervice;

    public function __construct(NewsRepositoryInterface $newsRepositoryInterface)
    {
        $this->middleware('role')->except(['index', 'show']);
        $this->newsRepositoryInterface = $newsRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->newsRepositoryInterface->getAll();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->newsRepositoryInterface->getById($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $imageName = $request->hasFile('image') ? $this->storeImageTmp($request->image) : null;

        $data = $request->all();
        $data['image'] = $imageName;
        $data['user_id'] = Auth::user()->id;

        return $this->newsRepositoryInterface->storeNews($data);
    }

    public function storeImageTmp($request)
    {
        $path = public_path('tmp');
        $imageName = $request->getClientOriginalName();

        if (File::exists($path . $imageName)) File::delete($path . $imageName);
        $request->move($path, $imageName);

        return $imageName;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        $imageName = $request->hasFile('image') ? $this->storeImageTmp($request->image) : null;

        $data = $request->all();
        $data['image'] = $imageName;

        return $this->newsRepositoryInterface->updateNews($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->newsRepositoryInterface->deleteNews($id);
    }
}
