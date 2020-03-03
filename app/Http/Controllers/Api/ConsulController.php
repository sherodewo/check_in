<?php

namespace App\Http\Controllers\Api\V1;

use App\Library\ApiBaseResponse;
use App\Http\Controllers\Controller;

class ConsulController extends Controller
{
    protected $apiBaseResponse;

    public function __construct(ApiBaseResponse $apiBaseResponse)
    {
        $this->apiBaseResponse = $apiBaseResponse;

    }

    public function checkHealthService()
    {
        return 'ping';
    }
}
