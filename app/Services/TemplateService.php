<?php


namespace App\Services;


use App\Repositories\TemplateRepository;

class TemplateService
{
    /**
     * @var TemplateRepository
     */
    private $template;

    public function __construct(TemplateRepository $template)
    {
        $this->template = $template;
    }

    public function find($id)
    {
        return $this->template->find($id);
    }

    public function store($request)
    {
        return $this->template->store($request);
    }

    public function update($request, $id)
    {
        return $this->template->update($request, $id);
    }

    public function delete($id)
    {
        return $this->template->delete($id);
    }
}
