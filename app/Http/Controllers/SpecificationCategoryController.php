<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeSpecificationCategoryRequest;
use App\Services\SpecificationCategoryService;
use Illuminate\Http\Request;

class SpecificationCategoryController extends Controller {

    protected SpecificationCategoryService $specificationCategoryService;

    public function __construct(
        SpecificationCategoryService $specificationCategoryService
    ) {
        $this->specificationCategoryService = $specificationCategoryService;
    }

    public function store(MakeSpecificationCategoryRequest $request) {
        return $this->specificationCategoryService->store($request->all());
    }

}
