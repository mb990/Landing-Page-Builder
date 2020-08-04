<?php


namespace App\Services;


use App\FooterSettings;
use App\GallerySettings;
use App\GeneralContentOneSettings;
use App\GeneralContentThreeSettings;
use App\GeneralContentTwoSettings;
use App\HeroSectionSettings;
use App\NewsletterSettings;
use App\PricingSection;
use App\Repositories\TemplateRepository;
use App\Template;
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

    public function findBySlug($slug)
    {
        return $this->template->findBySlug($slug);
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

    public function checkIfAllComponentsExist(array $components)
    {
//        if (array_search('', $components) !== false) {
//
//            return false;
//        }

        return $components;
    }

    public function getComponentViews($template)
    {
        $views = [];

        $views['topMenuSection'] = $this->getTopMenuSectionViewWithData($template);

        $views['heroSection'] = $this->getHeroSectionViewWithData($template);

        $views['generalContentOneSection'] = $this->getGeneralContentOneSectionViewWithData($template);

        $views['generalContentTwoSection'] = $this->getGeneralContentTwoSectionViewWithData($template);

        $views['generalContentThreeSection'] = $this->getGeneralContentThreeSectionViewWithData($template);

        $views['testimonialsSection'] = $this->getTestimonialsSectionViewWithData($template);

        $views['pricingSection'] = $this->getPricingSectionWithData($template);

        $views['newsletterSection'] = $this->getNewslatterSectionViewWithData($template);

        $views['gallerySection'] = $this->getGallerySectionViewWithData($template);

        $views['footerSection'] = $this->getFooterSectionWithData($template);

        return $this->checkIfAllComponentsExist($views);
    }

    public function checkIfSectionExists(Template $template, $section)
    {
        if ($template->getSection($section)->isEmpty()) {

            return false;
        }

        return true;
    }

    public function getTemplateSection(Template $template, $section)
    {
        if ($this->checkIfSectionExists($template, $section)) {

            $section = $template->getSection($section)[0];

            return $section;
        }

        return false;
    }

    public function getHeroSectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, HeroSectionSettings::class)) {

            $heroSection = $this->getTemplateSection($template, HeroSectionSettings::class);

            $imageUrl = $this->s3Service->showTemplateHeroSectionImage($template, $heroSection->pageElementable->image, 60);

            $viewWithData = view($heroSection->blade_file, ['image_url' => $imageUrl, 'data' => $heroSection->pageElementable])->render();

            return $viewWithData;
        }

        return false;
    }

    public function getTestimonialsSectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, TestimonialSection::class)) {

            $testimonialSection = $this->getTemplateSection($template, TestimonialSection::class);

            $images = [];

            if ($testimonialSection->pageElementable->singleItems) {

                foreach ($testimonialSection->pageElementable->singleItems as $singleItem) {

                    $images[$singleItem->id] = $this->s3Service->showTemplateTestimonialImage($template, $singleItem->image, 60);
                }
            }

            $heroSectionData = view($testimonialSection->blade_file, ['images' => $images, 'data' => $testimonialSection])->render();

            return $heroSectionData;

        }

        return false;
    }

    public function getTopMenuSectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, TopMenuSettings::class)) {

            $topMenuSection = $this->getTemplateSection($template, TopMenuSettings::class);

            $imageUrl = $this->s3Service->showTemplateTopMenuImage($template, $topMenuSection->pageElementable->image, 60);

            $viewWithData = view($topMenuSection->blade_file, ['image_url' => $imageUrl, 'data' => $topMenuSection])->render();

            return $viewWithData;

        }

        return false;
    }

    public function getFooterSectionWithData($template)
    {
        if ($this->getTemplateSection($template, FooterSettings::class)) {

            $footerSection = $this->getTemplateSection($template, FooterSettings::class);

            $viewWithData = view($footerSection->blade_file, ['data' => $footerSection->pageElementable])->render();

            return $viewWithData;

        }

        return false;
    }

    public function getPricingSectionWithData($template)
    {
        if ($this->getTemplateSection($template, PricingSection::class)) {

            $pricingSection = $this->getTemplateSection($template, PricingSection::class);

            $viewWithData = view($pricingSection->blade_file, ['data' => $pricingSection->pageElementable])->render();

            return $viewWithData;

        }

        return false;
    }

    public function getGeneralContentOneSectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, GeneralContentOneSettings::class)) {

            $generalContentOneSection = $this->getTemplateSection($template, GeneralContentOneSettings::class);

            $imageUrl = $this->s3Service->showTemplateGeneralContentOneImage($template, $generalContentOneSection->pageElementable->image, 60);

            $viewWithData = view($generalContentOneSection->blade_file, ['data' => $generalContentOneSection->pageElementable, 'image_url' => $imageUrl])->render();

            return $viewWithData;

        }

        return false;
    }

    public function getGeneralContentTwoSectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, GeneralContentTwoSettings::class)) {

            $generalContentTwoSection = $this->getTemplateSection($template, GeneralContentTwoSettings::class);

            $imageUrl = $this->s3Service->showTemplateGeneralContentTwoImage($template, $generalContentTwoSection->pageElementable->image, 60);

            $viewWithData = view($generalContentTwoSection->blade_file, ['data' => $generalContentTwoSection->pageElementable, 'image_url' => $imageUrl])->render();

            return $viewWithData;

        }

        return false;
    }

    public function getGeneralContentThreeSectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, GeneralContentThreeSettings::class)) {

            $generalContentThreeSection = $this->getTemplateSection($template, GeneralContentThreeSettings::class);

            $viewWithData = view($generalContentThreeSection->blade_file, ['data' => $generalContentThreeSection->pageElementable])->render();

            return $viewWithData;

        }

        return false;
    }

    public function getNewslatterSectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, NewsletterSettings::class)) {

            $newsletterSection = $this->getTemplateSection($template, NewsletterSettings::class);

            $viewWithData = view($newsletterSection->blade_file, ['data' => $newsletterSection->pageElementable])->render();

            return $viewWithData;

        }

        return false;
    }

    public function getGallerySectionViewWithData($template)
    {
        if ($this->getTemplateSection($template, GallerySettings::class)) {

            $gallerySettings = $this->getTemplateSection($template, GallerySettings::class);

//            $images = [];
//
//            $videos = [];

            $data = ['videos' => [], 'images' => [], 'data' => $gallerySettings->pageElementable];

            if ($gallerySettings->pageElementable->videoItems) {

                foreach ($gallerySettings->pageElementable->videoItems as $videoItem) {

                    $data['videos'][$videoItem->id] = $this->s3Service->showGalleryVideo($template, $videoItem, 60);
                }
            }

            if ($gallerySettings->pageElementable->imageItems) {

                foreach ($gallerySettings->pageElementable->imageItems as $imageItem) {

                    $data['images'][$imageItem->id] = $this->s3Service->showTemplateGalleryImageItemImage($template, $imageItem->image, 60);
                }
            }

            $heroSectionData = view($gallerySettings->blade_file, ['data' => $data])->render();

            return $heroSectionData;

        }

        return false;
    }
}
