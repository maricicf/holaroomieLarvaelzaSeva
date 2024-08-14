<?php

namespace App\Services;

use App\Repositories\Page\PageRepository;
use Inertia\Inertia;

class PageService {

    protected PageRepository $pageRepository;

    protected PropertyService $propertyService;

    public function __construct(
        PageRepository $pageRepository,
        PropertyService $propertyService
    ) {
        $this->pageRepository = $pageRepository;
        $this->propertyService = $propertyService;
    }

    public function home() {
        $params = [
            'number' => 10,
        ];

        $properties = $this->propertyService->all($params);

        return Inertia::render('Landing/Pages/index/index',
            ['properties' => $properties]);
    }

    public function faq() {
        $data = $this->pageRepository->getFaqPageData();
        return Inertia::render('Landing/Pages/pages/faqs',
            ['data' => $data]);
    }

    public function packages() {
        return Inertia::render('Landing/Pages/pages/packages');
    }

    public function rent() {
        $params = [
            'paginate' => 10,
        ];

        $properties = $this->propertyService->all($params);

        return Inertia::render('Landing/Pages/listing/rent', [
            'properties' => $properties,
        ]);
    }

    public function propertyDetail($id) {
        $property = $this->propertyService->find($id);

        if (!$property) {
            return redirect()->route('home');
        }

        return Inertia::render('Landing/Pages/listing/property-detail', [
            'id' => $id,
            'data' => $property,
        ]);
    }

    public function blog() {
        return Inertia::render('Landing/Pages/pages/blog/blogs');
    }

    public function blogDetail($id) {
        return Inertia::render('Landing/Pages/pages/blog/blog-detail', [
            'id' => $id,
        ]);
    }

    public function contact() {
        return Inertia::render('Landing/Pages/contact');
    }

    public function login() {
        return Inertia::render('Landing/Pages/pages/auth-pages/auth-login');
    }

    public function register() {
        return Inertia::render('Landing/Pages/pages/auth-pages/auth-register');
    }

    public function rePassword() {
        return Inertia::render('Landing/Pages/pages/auth-pages/auth-re-password');
    }

    public function about() {
        return Inertia::render('Landing/Pages/pages/aboutus');
    }

    public function profile() {
        return Inertia::render('Landing/Pages/pages/agents/agent-profile');
    }

}
