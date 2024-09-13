<?php

namespace App\Repositories\Page;

use App\Repositories\Faq\FaqRepository;

class PageRepository implements IPageRepository {

    protected $faqRepository;

    public function __construct(FaqRepository $faqRepository) {
        $this->faqRepository = $faqRepository;
    }

    public function getHomePageData() {
        // TODO: Implement getHomePageData() method.
    }

    public function getAboutPageData() {
        // TODO: Implement getAboutPageData() method.
    }

    public function getFaqPageData() {
        return $this->faqRepository->all();
    }

    public function getPackagesPageData() {
        // TODO: Implement getPackagesPageData() method.
    }

    public function getRentPageData() {
        // TODO: Implement getRentPageData() method.
    }

    public function getPropertyDetailPageData($id) {
        // TODO: Implement getPropertyDetailPageData() method.
    }

    public function getBlogPageData() {
        // TODO: Implement getBlogPageData() method.
    }

    public function getBlogDetailPageData($id) {
        // TODO: Implement getBlogDetailPageData() method.
    }

    public function getContactPageData() {
        // TODO: Implement getContactPageData() method.
    }

    public function getLoginPageData() {
        // TODO: Implement getLoginPageData() method.
    }

    public function getRegisterPageData() {
        // TODO: Implement getRegisterPageData() method.
    }

    public function getRePasswordPageData() {
        // TODO: Implement getRePasswordPageData() method.
    }

    public function getProfilePageData() {
        $user = auth()
            ->user()
            ->with('reservations')
            ->with('reservations.property')
            ->with('reservations.property.images')
            ->first();

        return $user;
    }

}
