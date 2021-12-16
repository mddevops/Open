<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\NotebookStoreRequest;
use App\Model\Notebook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class NotebookController extends Controller
{

    /**
     * @OA\Get(
     *     path="/notebook",
     *     operationId="notebookAll",
     *     tags={"Notebook"},
     *     summary="Get all notebooks",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found"
     *
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $model = Notebook::query()->paginate(5);
        return response()->json($model);
    }

    /**
     * @OA\Post(
     *     path="/notebook",
     *     operationId="notebookCreate",
     *     tags={"Notebook"},
     *     summary="Create a new notebook",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookStoreRequest")
     *     ),
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\NotebookStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(NotebookStoreRequest $request): JsonResponse
    {

        $image = $request->file('image');
        //dd($image);
        if($image != null) {
            $name = time().'.'.$image->getClientOriginalName();
            $image->move(public_path().'/notebook/', $name);

            $data = new Notebook();
            $data->fill($request->all());
            $data->image = $name;
            $data->save();

        }else{
            $data = new Notebook();
            $data->fill($request->all());
            $data->save();
        }

        return response()->json($data);

    }

    /**
     * @OA\Get(
     *     path="/notebook/{id}",
     *     operationId="notebookGet",
     *     tags={"Notebook"},
     *     summary="Get notebook by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of notebook",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     * )
     *
     * Display a listing of the resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $data = Notebook::query()->findOrFail($id);
        return response()->json($data);
    }



    /**
     * @OA\Put(
     *     path="/notebook/{id}",
     *     operationId="notebookUpdate",
     *     tags={"Notebook"},
     *     summary="Update notebook by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of notebook",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookStoreRequest")
     *     ),
     * )
     *
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, int $id): JsonResponse
    {
        $params = $request->all();
        $data  = Notebook::query()->findOrFail($id);
        $image = $request->file('image');
        //dd($params);
        if($image != null) {

            if(\File::exists(public_path('/notebook/'.$data->image)))
            {
                \File::delete(public_path('/notebook/'.$data->image));
            }

            $name = time().'.'.$image->getClientOriginalName();
            $image->move(public_path().'/notebook/', $name);

            $data->fill($params);
            $data->image = $name;
            $data->save();

        }else{

            $data->fill($params);
            $data->save();

        }

        return response()->json($data);
    }

    /**
     * @OA\Delete(
     *     path="/notebook/{id}",
     *     operationId="notebookDelete",
     *     tags={"Notebook"},
     *     summary="Delete notebook by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of notebook",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="202",
     *         description="Deleted",
     *     ),
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id): Response
    {
        $data = Notebook::query()->findOrFail($id);
        if(\File::exists(public_path('/notebook/'.$data->image)))
        {
            \File::delete(public_path('/notebook/'.$data->image));
        }
        $data->delete();

        return response(null, HttpResponse::HTTP_ACCEPTED);
    }


}
