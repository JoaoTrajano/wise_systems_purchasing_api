<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingRequest;
use Exception;

class ShoppingRequestController extends Controller
{
    /**
     * Retorna todas as solicitações feitas.
     *
     * @return json
     */
    public function index()
    {
        $shoppingRequests = ShoppingRequest::all()->toArray();

        return $this->buildResponse($shoppingRequests, 200, "");
    }

    /**
     * Cria uma nova solicitação
     *
     * @param Request $request
     * @return json
     */
    public function store(Request $request)
    {
        try {
            $newShoppingRequest = ShoppingRequest::create($request->all())->toArray();

            if ($newShoppingRequest) {
                return $this->buildResponse(
                    $newShoppingRequest, 200, "Solicitação criada com sucesso!"
                );
            }
        } catch (Exception $e) {
            throw $this->buildResponse([], 400, $e->getMessage());
        }
    }
}
