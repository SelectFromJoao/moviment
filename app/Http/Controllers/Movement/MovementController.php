<?php

namespace App\Http\Controllers\Movement;

use App\Http\Controllers\Controller;
use App\services\Movement\MovementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class MovementController extends Controller
{

    /**
     * @OA\Info(title="Moviments API", version="0.1")
     */

    /**
     * @OA\Get(
     *     path="/movement/{id}",
     *      @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Buscar ranking de movimentos por ID",
     *         required=true,
     *      ),
     *     @OA\Response(response=201, description="Successful created", @OA\JsonContent()),
     * )
     */


    public function index(Request $request) :JsonResponse
    {

        try {
            $service = new MovementService();
            $data = $service->getMovements($request->All());
            return response()->json($data);;
        }catch(Exception $e){
            return response($e, 500)
            ->header('Content-Type', 'text/plain');
        }

    }
}
