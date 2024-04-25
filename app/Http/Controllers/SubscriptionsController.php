<?php

namespace App\Http\Controllers;

use App\Http\Services\AutenticationService;
use App\Http\Services\SubscriptionsService;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index(Request $request)
    {
        $ok = AutenticationService::verificaAutenticacao($request->bearerToken());
        if (!$ok)
        {
            return response()->json([
                "success" => false,
                "message" => "Não autorizado!",
                403
            ]);
        }
            
        $token = AutenticationService::login();
        $result = SubscriptionsService::registrarInscricao($request, $token);

        return json_decode($result);
    }

    public function searchSubscription(Request $request, $args)
    {
        $ok = AutenticationService::verificaAutenticacao($request->bearerToken());
        if (!$ok)
        {
            return response()->json([
                "success" => false,
                "message" => "Não autorizado!",
                403
            ]);
        }
            
        $token = AutenticationService::login();
        $result = SubscriptionsService::buscarInscricao($args, $token);

        return json_decode($result);
    }

    public function cancel(Request $request, $args)
    {
        $ok = AutenticationService::verificaAutenticacao($request->bearerToken());
        if (!$ok)
        {
            return response()->json([
                "success" => false,
                "message" => "Não autorizado!",
                403
            ]);
        }
            
        $token = AutenticationService::login();
        $result = SubscriptionsService::cancelSubscription($args, $token);

        return json_decode($result);
    }

    public function checkin(Request $request, $args)
    {
        $ok = AutenticationService::verificaAutenticacao($request->bearerToken());
        if (!$ok)
        {
            return response()->json([
                "success" => false,
                "message" => "Não autorizado!",
                403
            ]);
        }
            
        $token = AutenticationService::login();
        $result = SubscriptionsService::checkin($args, $token);

        return json_decode($result);
    }
}