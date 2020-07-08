<?php

namespace App\Http\Controllers;

use App\Services\TemplateService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var TemplateService
     */
    private $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    public function test()
    {
        return view('test');
    }

    public function controlPanel()
    {
        return view('control-panel.index');
    }

    public function testProject()
    {
        $templates = $this->templateService->all();

        return view('test-project', compact('templates'));
    }

    public function testProject2($id)
    {
        return view('test-project2');
    }
}
