<?php

namespace App\Http\Controllers;

use App\Repositories\Property\PropertyRepository;
use App\Services\AdminPagesService;

class AdminPageController extends Controller {

    protected AdminPagesService $adminPagesService;

    protected PropertyRepository $propertyRepository;

    public function __construct(
        AdminPagesService $adminPagesService,
    ) {
        $this->adminPagesService = $adminPagesService;
    }

    public function dashboard() {
        return $this->adminPagesService->dashboard();
    }

    public function properties() {
        return $this->adminPagesService->properties();
    }

    public function createProperty() {
        return $this->adminPagesService->createProperty();
    }

    public function reservations() {
        return $this->adminPagesService->reservations();
    }

    public function editReservation($id) {
        return $this->adminPagesService->editReservation($id);
    }

    public function utilities() {
        return $this->adminPagesService->utilities();
    }

    public function createUtility() {
        return $this->adminPagesService->createUtility();
    }

    public function users() {
        return $this->adminPagesService->users();
    }

    public function blog() {
        return $this->adminPagesService->blog();
    }

    public function messages() {
        return $this->adminPagesService->messages();
    }

    public function categories() {
        return $this->adminPagesService->categories();
    }

    public function createCategory() {
        return $this->adminPagesService->createCategory();
    }

    public function createBlog() {
        return $this->adminPagesService->createBlog();
    }

    public function areas() {
        return $this->adminPagesService->areas();
    }

    public function createArea() {
        return $this->adminPagesService->createArea();
    }

    public function hotspots() {
        return $this->adminPagesService->hotspots();
    }

    public function createHotspot() {
        return $this->adminPagesService->createHotspot();
    }

}
