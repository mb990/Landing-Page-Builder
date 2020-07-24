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

    public function adminPanel()
    {
        return view('admin.index');
    }

    public function addTemplate()
    {
        return view('admin.add-template');
    }

    public function templates()
    {
        $templates = $this->templateService->all();

        return view('admin.templates', compact('templates'));
    }

    public function showTemplate($id)
    {
        return view('admin.show-template');
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
