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
        $templates = $this->templateService->all();

        return response()->json(['templates' => $templates]);
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = $this->templateService->store($request);

        return response()->json(['success' => 'Template created', 'template' => $template]);
    }

    public function show($id)
    {
        $template = $this->templateService->find($id);

        $elements = $template->pageElements;

        $views = $this->templateService->getComponentViews($template);

        return response()->json(['template' => $template, 'elements' => $elements, 'views' => $views]);
    }
}
