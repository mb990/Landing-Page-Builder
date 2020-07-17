<?php

namespace App\Http\Controllers;

use App\Services\AwesomeIconsService;
use Illuminate\Http\Request;

class AwesomeIconController extends Controller
{
    /**
     * @var AwesomeIconsService
     */
    private $awesomeIconsService;

    public function __construct(AwesomeIconsService $awesomeIconsService)
    {
        $this->awesomeIconsService = $awesomeIconsService;
    }

    public function index()
    {
        $awesomeIcons = $this->awesomeIconsService->all();

        return response()->json(['awesomeIcons' => $awesomeIcons]);
    }
}
