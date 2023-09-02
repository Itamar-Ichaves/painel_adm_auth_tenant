<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;

class TenantApiController extends Controller
{
    protected $tenantService;
    protected $repository;

    public function __construct(
        TenantService $tenantService,
        Tenant $repository)
    {
        $this->tenantService = $tenantService;
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $per_page = (int) $request->get('per_page', 15);

        $tenants = $this->tenantService->getAllTenants($per_page);

        return TenantResource::collection($tenants);
    }

    public function show($uuid)
    {
         if (!$tenant = $this->tenantService->getTenantByUuid($uuid)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json( $tenant );
    }


    public function verificToken(Request $request, $uuid)
    {
         if (!$tenant = $this->repository->where($uuid)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json(http_response_code(200));
    }
   
}
