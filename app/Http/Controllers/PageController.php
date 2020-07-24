<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\ProfileRequest;
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

    public function adminPanel(AdminRequest $request)
    {
        return view('admin.index');
    }

    public function addTemplate(AdminRequest $request)
    {
        return view('admin.add-template');
    }

    public function templates(AdminRequest $request)
    {
        $templates = $this->templateService->all();

        return view('admin.templates', compact('templates'));
    }

    public function showTemplate(AdminRequest $request, $id)
    {
        return view('admin.show-template');
    }

    public function test2()
    {
        return view('test2');
    }

    public function profile(ProfileRequest $request)
    {
        $templates = $this->templateService->all();

        return view('profile.profile', compact('templates'));
    }

    public function newProject()
    {
        return view('profile.new-project');
    }
}
