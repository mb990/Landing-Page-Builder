<?php


namespace App\Services;


use App\Repositories\TemplateRepository;

class TemplateService
{
    /**
     * @var TemplateRepository
     */
    private $template;
    /**
     * @var S3Service
     */
    private $s3Service;

    public function __construct(TemplateRepository $template, S3Service $s3Service)
    {
        $this->template = $template;
        $this->s3Service = $s3Service;
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

                $imageLinks = [];

                foreach ($element->pageElementable->singleItems as $singleTestimonial) {

                    $imageLinks[$singleTestimonial->id] = $this->s3Service->showTemplateTestimonialImage($element->template, $singleTestimonial->image, 60);
                }

                $views[$element->id] = view($element->blade_file, ['images' => $imageLinks, 'items' => $element->pageElementable->singleItems])->render();
            }

            else if ($element->pageElementable->links) {

                $url = $this->s3Service->showTemplateTopMenuImage($element->template, $element->pageElementable->image, 60);

                $views[$element->id] = view($element->blade_file, ['image_url' => $url, 'items' => $element->pageElementable->links])->render();
            }

            else {

                $views[$element->id] = view($element->blade_file, ['element' => $element->pageElementable])->render();
            }
        }

        return $views;
    }
}
