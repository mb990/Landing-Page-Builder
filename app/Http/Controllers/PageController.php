<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ProfileRequest;
use App\Project;
use App\Services\ProjectService;
use App\Services\TemplateService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var TemplateService
     */
    private $templateService;
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(TemplateService $templateService, ProjectService $projectService)
    {
        $this->templateService = $templateService;
        $this->projectService = $projectService;
    }

    public function test1()
    {
        return view('test1');
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

    public function adminShowTemplate(AdminRequest $request, $slug)
    {
        return view('admin.show-template');
    }

    public function userShowTemplate(AuthRequest $request, $slug)
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
        $project = $this->projectService->findLatestForUser(auth()->user());

        return view('profile.new-project')
            ->with('project', $project);
    }
}
