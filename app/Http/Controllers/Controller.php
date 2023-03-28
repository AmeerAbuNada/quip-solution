<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successResponse() {
        return response()->json([
            'message' => App::isLocale('en') ? 'Operation Ran Successfully!' : 'تمت العملية بنجاح',
        ], Response::HTTP_OK);
    }

    public function errorResponse() {
        return response()->json([
            'message' => App::isLocale('en') ? 'Something went wrong, Please try again.' : 'فشلت العملية, يرجى المحاولة مرة أخرى',
        ], Response::HTTP_BAD_REQUEST);
    }
}
