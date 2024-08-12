<?php

namespace App\Http\Controllers;

use App\Repositories\Page\PageRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller {

    protected $pageRepository;

    public function __construct(PageRepository $pageRepository) {
        $this->pageRepository = $pageRepository;
    }

    public function home() {
        return Inertia::render('Landing/Pages/index/index');
    }

    public function faq() {
        return Inertia::render('Landing/Pages/pages/faqs');
    }

    public function packages() {
        return Inertia::render('Landing/Pages/pages/packages');
    }

    public function rent() {
        return Inertia::render('Landing/Pages/listing/rent');
    }

    public function propertyDetail($id) {
        return Inertia::render('Landing/Pages/listing/property-detail', [
            'id' => $id,
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

}
