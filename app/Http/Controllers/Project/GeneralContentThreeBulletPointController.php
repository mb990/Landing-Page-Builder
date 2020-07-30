<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectGeneralContentThreeBulletPointRequest;
use App\Services\GeneralContentThreeBulletPointService;
use Illuminate\Http\Request;

class GeneralContentThreeBulletPointController extends Controller
{
    /**
     * @var GeneralContentThreeBulletPointService
     */
    private $generalContentThreeBulletPointService;

    public function __construct(GeneralContentThreeBulletPointService $generalContentThreeBulletPointService)
    {
        $this->generalContentThreeBulletPointService = $generalContentThreeBulletPointService;
    }

    public function store(StoreProjectGeneralContentThreeBulletPointRequest $request)
    {
        $bulletPoint = $this->generalContentThreeBulletPointService->store($request);

        return response()->json(['bulletPoint' => $bulletPoint]);
    }
}
