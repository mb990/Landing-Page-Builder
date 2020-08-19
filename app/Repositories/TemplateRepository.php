<?php


namespace App\Repositories;


use App\Template;

/**
 * Class TemplateRepository
 * @package App\Repositories
 */
class TemplateRepository
{
    /**
     * @var Template
     */
    private $template;

    /**
     * TemplateRepository constructor.
     * @param Template $template
     */
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    /**
     * @return Template[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->template->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->template->find($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->template->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->template->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
