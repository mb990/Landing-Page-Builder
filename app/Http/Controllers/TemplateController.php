<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Services\TemplateService;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * @var TemplateService
     */
    private $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    public function index()
    {
        return view('control-panel.index');
    }

    public function store(StoreTemplateRequest $request)
    {
        $this->templateService->store($request);

        return response()->json(['success' => 'Template created']);
    }
}
