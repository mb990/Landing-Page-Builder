<?php


namespace App\Repositories;


use App\Template;

class TemplateRepository
{
    /**
     * @var Template
     */
    private $template;

    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    public function all()
    {
        return $this->template->all();
    }

    public function find($id)
    {
        return $this->template->find($id);
    }

    public function findBySlug($slug)
    {
        return $this->template->where('slug', $slug)
            ->firstOrFail();
    }

    public function store($request)
    {
        return $this->template->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
