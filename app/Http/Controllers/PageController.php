<?php

namespace App\Http\Controllers;

use App\Repositories\Page\PageRepository;
use App\Services\PageService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller {

    protected PageService $pageService;

    public function __construct(PageService $pageService) {
        $this->pageService = $pageService;
    }

    public function home() {
        return $this->pageService->home();
    }

    public function faq() {
        return $this->pageService->faq();
    }

    public function packages() {
        return $this->pageService->packages();
    }

    public function rent() {
        return $this->pageService->rent();
    }

    public function propertyDetail($id) {
        return $this->pageService->propertyDetail($id);
    }

    public function blog() {
        return $this->pageService->blog();
    }

    public function blogDetail($id) {
        return $this->pageService->blogDetail($id);
    }

    public function contact() {
        return $this->pageService->contact();
    }

    public function login() {
        return $this->pageService->login();
    }

    public function register() {
        return $this->pageService->register();
    }

    public function about() {
        return $this->pageService->about();
    }

    public function rePassword() {
        return $this->pageService->rePassword();
    }

    public function profile() {
        return $this->pageService->profile();
    }

}
