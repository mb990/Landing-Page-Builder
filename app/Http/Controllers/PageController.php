<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ProfileRequest;
use App\Project;
use App\Services\ProjectService;
use App\Services\TemplateService;
use Illuminate\Http\Request;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
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

    /**
     * PageController constructor.
     * @param TemplateService $templateService
     * @param ProjectService $projectService
     */
    public function __construct(TemplateService $templateService, ProjectService $projectService)
    {
        $this->templateService = $templateService;
        $this->projectService = $projectService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function test1()
    {
        return view('test1');
    }

    /**
     * @param AdminRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminPanel(AdminRequest $request)
    {
        return view('admin.index');
    }

    /**
     * @param AdminRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addTemplate(AdminRequest $request)
    {
        return view('admin.add-template');
    }

    /**
     * @param AdminRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function templates(AdminRequest $request)
    {
        $templates = $this->templateService->all();

        return view('admin.templates', compact('templates'));
    }

    /**
     * @param AdminRequest $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminShowTemplate(AdminRequest $request, $slug)
    {
        return view('admin.show-template');
    }

    /**
     * @param AuthRequest $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userShowTemplate(AuthRequest $request, $slug)
    {
        return view('admin.show-template');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function test2()
    {
        return view('test2');
    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(ProfileRequest $request)
    {
        $templates = $this->templateService->all();

        return view('profile.profile', compact('templates'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newProject($slug)
    {
        $project = $this->projectService->findBySlug($slug);

        return view('profile.new-project')
            ->with('project', $project);
    }
}
