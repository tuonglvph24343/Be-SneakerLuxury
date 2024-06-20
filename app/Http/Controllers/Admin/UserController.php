<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Admin\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserCollection;

class UserController extends BaseController
{
    /**
     * list
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $data = UserService::getInstance()->data(...$this->getParamRequest($request));
        return $this->sendSuccessResponse(new UserCollection($data));
    }
}
