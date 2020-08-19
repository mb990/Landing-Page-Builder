<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Services\TemplateService;
use Illuminate\Http\Request;

/**
 * Class TemplateController
 * @package App\Http\Controllers
 */
class TemplateController extends Controller
{
    /**
     * @var TemplateService
     */
    private $templateService;

    /**
     * TemplateController constructor.
     * @param TemplateService $templateService
     */
    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $templates = $this->templateService->all();

        return response()->json(['templates' => $templates]);
    }

    /**
     * @param StoreTemplateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTemplateRequest $request)
    {
        $template = $this->templateService->store($request);

        return response()->json(['success' => 'Template created', 'template' => $template]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        $template = $this->templateService->findBySlug($slug);

        $elements = $template->pageElements;

        $views = $this->templateService->getComponentViews($template);

        return response()->json(['template' => $template, 'elements' => $elements, 'views' => $views]);
    }
}
