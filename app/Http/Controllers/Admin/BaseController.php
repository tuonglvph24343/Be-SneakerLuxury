<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $guard = 'admin';

    /**
     * getParamRequest
     *
     * @param  Request $request
     * @return array
     */
    public function getParamRequest(Request $request): array
    {
        $search = data_get($request, 'search');
        $perPage = data_get($request, 'per_page');
        $orders = data_get($request, 'orders');
        $filters = data_get($request, 'filters');
        $all = data_get($request, 'all');

        return [$search, $orders, $filters, $perPage, $all];
    }
}