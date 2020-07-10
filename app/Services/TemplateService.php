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

    public function all()
    {
        return $this->template->all();
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

    public function getComponentViews($template)
    {
        $views = [];

        foreach ($template->elementsWithItems() as $element) {

            if ($element->pageElementable->singleItems) {

                $views[$element->id] = view($element->blade_file, ['items' => $element->pageElementable->singleItems])->render();
            }

            else {

                $views[$element->id] = view($element->blade_file, ['items' => $element->pageElementable->links])->render();
            }
        }

        return $views;
    }
}
