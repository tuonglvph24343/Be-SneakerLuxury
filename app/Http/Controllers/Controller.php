<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Get the guest middleware for the application.
     *
     * @return string
     */
    public function guestMiddleware()
    {
        $guard = $this->getGuard();
        return $guard ? ('guest:' . $guard) : 'guest';
    }

    /**
     * Get the auth middleware for the application.
     *
     * @return string
     */
    public function authMiddleware()
    {
        $guard = $this->getGuard();
        return $guard ? ('auth:' . $guard) : 'auth';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return string
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : config('auth.defaults.guard');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->getGuard());
    }

    /**
     * sendErrorResponse
     *
     * @param  $message
     * @param  $errors
     * @param  $code
     * @return JsonResponse
     */
    protected function sendErrorResponse($message, $errors = null, $code = ResponseHelper::STATUS_CODE_BAD_REQUEST): JsonResponse
    {
        return ResponseHelper::sendResponse($code, $message, null, $errors);
    }

    /**
     * sendSuccessResponse
     *
     * @param  $data
     * @param  $message
     * @param  $code
     * @return JsonResponse
     */
    protected function sendSuccessResponse($data, $message = '', $code = ResponseHelper::STATUS_CODE_SUCCESS): JsonResponse
    {
        return ResponseHelper::sendResponse($code, $message, $data);
    }

    /**
     * sendResponse
     *
     * @param  $data
     * @param  $type
     * @param  $message
     * @param  $code
     * @return JsonResponse
     */
    protected function sendResponse($data, string $type = 'list', string $message = null, $code = null): JsonResponse
    {
        if (data_get($data, 'message')) {
            return $this->sendErrorResponse($data['message'], '', data_get($data, 'status_code'));
        }
        return $this->sendSuccessResponse(
            $data,
            $message ?? trans('response.' . $type . '_success'),
            $code ?? ResponseHelper::STATUS_CODE_SUCCESS
        );
    }
}
