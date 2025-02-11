<?php

namespace App\Http\Controllers;

use App\Services\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller {

    protected PropertyService $propertyService;

    public function __construct(PropertyService $propertyService) {
        $this->propertyService = $propertyService;
    }

    public function create(Request $request) {
        return $this->propertyService->create($request->all());
    }

    public function store(Request $request) {
        return $this->propertyService->store($request->all());
    }

    public function delete($id) {
        return $this->propertyService->delete($id);
    }

}
