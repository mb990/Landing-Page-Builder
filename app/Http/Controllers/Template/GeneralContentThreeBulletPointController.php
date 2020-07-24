<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateGeneralContentThreeBulletPointRequest;
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

    public function store(StoreTemplateGeneralContentThreeBulletPointRequest $request)
    {
        $bulletPoint = $this->generalContentThreeBulletPointService->store($request);

        return response()->json(['bulletPoint' => $bulletPoint]);
    }
}
