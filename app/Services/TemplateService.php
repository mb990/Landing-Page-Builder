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

    public function getComponentViews($elements)
    {
        $views = [];

        foreach ($elements as $element) {

            $views[$element->id] = view($element->blade_file)->render();

            return $elements;

            foreach ($element->pageElement->singleItems as $item) {

                $views[$element->id]['content'] = view($item->blade_file)->render();
            }
        }

        return $views;
    }
}
