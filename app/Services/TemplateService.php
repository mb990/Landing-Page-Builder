<?php


namespace App\Services;


use App\FooterSettings;
use App\HeroSectionSettings;
use App\PricingSection;
use App\Repositories\TemplateRepository;
use App\TestimonialSection;
use App\TopMenuSettings;

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

        $views['heroSection'] = $this->getHeroSectionViewWithData($template);

        $views['testimonialsSection'] = $this->getTestimonialsSectionViewWithData($template);

        $views['topMenuSection'] = $this->getTopMenuSectionViewWithData($template);

        $views['footerSection'] = $this->getFooterSectionWithData($template);

        $views['pricingSection'] = $this->getPricingSectionWithData($template);

        return $views;
    }

    public function getHeroSectionViewWithData($template)
    {
        $heroSection = $template->getSection(HeroSectionSettings::class)[0];

        $imageUrl = $this->s3Service->showTemplateHeroSectionImage($template, $heroSection->pageElementable->image, 60);

        $viewWithData = view($heroSection->blade_file, ['image_url' => $imageUrl, 'data' => $heroSection->pageElementable])->render();

        return $viewWithData;
    }

    public function getTestimonialsSectionViewWithData($template)
    {
        $testimonialSection = $template->getSection(TestimonialSection::class)[0];

        $images = [];

        foreach ($testimonialSection->pageElementable->singleItems as $singleItem) {

            $images[$singleItem->id] = $this->s3Service->showTemplateTestimonialImage($template, $singleItem->image, 60);
        }

        $heroSectionData = view($testimonialSection->blade_file, ['images' => $images, 'items' => $testimonialSection->pageElementable->singleItems])->render();

        return $heroSectionData;
    }

    public function getTopMenuSectionViewWithData($template)
    {
        $topMenuSection = $template->getSection(TopMenuSettings::class)[0];

        $imageUrl = $this->s3Service->showTemplateTopMenuImage($template, $topMenuSection->pageElementable->image, 60);

        $viewWithData = view($topMenuSection->blade_file, ['image_url' => $imageUrl, 'items' => $topMenuSection->pageElementable->links])->render();

        return $viewWithData;
    }

    public function getFooterSectionWithData($template)
    {
        $footerSection = $template->getSection(FooterSettings::class)[0];

        $viewWithData = view($footerSection->blade_file, ['data' => $footerSection->pageElementable])->render();

        return $viewWithData;
    }

    public function getPricingSectionWithData($template)
    {
        $pricingSection = $template->getSection(PricingSection::class)[0];

        $viewWithData = view($pricingSection->blade_file, ['items' => $pricingSection->pageElementable->singleItems])->render();

        return $viewWithData;
    }
}
