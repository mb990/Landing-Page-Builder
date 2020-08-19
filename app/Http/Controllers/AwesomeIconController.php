<?php

namespace App\Http\Controllers;

use App\Services\AwesomeIconsService;
use Illuminate\Http\Request;

/**
 * Class AwesomeIconController
 * @package App\Http\Controllers
 */
class AwesomeIconController extends Controller
{
    /**
     * @var AwesomeIconsService
     */
    private $awesomeIconsService;

    /**
     * AwesomeIconController constructor.
     * @param AwesomeIconsService $awesomeIconsService
     */
    public function __construct(AwesomeIconsService $awesomeIconsService)
    {
        $this->awesomeIconsService = $awesomeIconsService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $awesomeIcons = $this->awesomeIconsService->all();

        return response()->json(['awesomeIcons' => $awesomeIcons]);
    }
}
