<?php

namespace App\Services;

use App\Models\Area;
use App\Models\City;
use App\Models\SpecificationCategory;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Page\PageRepository;
use Inertia\Inertia;

class PageService {

    protected PageRepository $pageRepository;

    protected BlogRepository $blogRepository;

    protected PropertyService $propertyService;

    public function __construct(
        PageRepository $pageRepository,
        PropertyService $propertyService,
        BlogRepository $blogRepository
    ) {
        $this->pageRepository = $pageRepository;
        $this->propertyService = $propertyService;
        $this->blogRepository = $blogRepository;
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

    public function rent($params) {
        $params['paginate'] = 10;
        $properties = $this->propertyService->all($params);
        //        dd($params);
        $specificationCategories = SpecificationCategory::with('specifications')
            ->get();
        $areas = Area::all();
        $cities = City::all();

        return Inertia::render('Landing/Pages/listing/rent', [
            'properties' => $properties,
            'specificationCategories' => $specificationCategories,
            'areas' => $areas,
            'cities' => $cities,
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
        $blogs = $this->blogRepository->all();
        return Inertia::render('Landing/Pages/pages/blog/blogs', [
            'blogs' => $blogs,
        ]);
    }

    public function blogDetail($id) {
        $blog = $this->blogRepository->find($id);

        return Inertia::render('Landing/Pages/pages/blog/blog-detail', [
            'id' => $id,
            'data' => $blog,
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
        $user = $this->pageRepository->getProfilePageData();

        return Inertia::render('Landing/Pages/pages/agents/agent-profile', [
            'user' => $user,
        ]);
    }

}
