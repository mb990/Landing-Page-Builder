<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentThreeBulletPointRequest;
use App\Services\GeneralContentThreeBulletPointService;
use Illuminate\Http\Request;

/**
 * Class GeneralContentThreeBulletPointController
 * @package App\Http\Controllers\Template
 */
class GeneralContentThreeBulletPointController extends Controller
{
    /**
     * @var GeneralContentThreeBulletPointService
     */
    private $generalContentThreeBulletPointService;

    /**
     * GeneralContentThreeBulletPointController constructor.
     * @param GeneralContentThreeBulletPointService $generalContentThreeBulletPointService
     */
    public function __construct(GeneralContentThreeBulletPointService $generalContentThreeBulletPointService)
    {
        $this->generalContentThreeBulletPointService = $generalContentThreeBulletPointService;
    }

    /**
     * @param StoreTemplateGeneralContentThreeBulletPointRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateGeneralContentThreeBulletPointRequest $request)
    {
        $bulletPoint = $this->generalContentThreeBulletPointService->store($request);

        return response()->json(['bulletPoint' => $bulletPoint]);
    }
}
