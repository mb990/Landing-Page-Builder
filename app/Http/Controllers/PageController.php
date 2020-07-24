<?php

namespace App\Http\Controllers;

use App\Services\TemplateImageService;
use App\Services\TemplateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * @var TemplateService
     */
    private $templateService;
    /**
     * @var TemplateImageService
     */
    private $templateImageService;

    public function __construct(TemplateService $templateService, TemplateImageService $templateImageService)
    {
        $this->templateService = $templateService;
        $this->templateImageService = $templateImageService;
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

    public function test2()
    {
        return view('test2');
    }

    public function profile()
    {
        return view('profile.profile');
    }

    public function newProject()
    {
        return view('profile.new-project');
    }
}
