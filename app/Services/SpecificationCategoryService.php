<?php

namespace App\Services;

use App\Repositories\SpecificationCategory\SpecificationCategoryRepository;

class SpecificationCategoryService {

    protected SpecificationCategoryRepository $specificationCategoryRepository;

    public function __construct(
        SpecificationCategoryRepository $specificationCategoryRepository
    ) {
        $this->specificationCategoryRepository = $specificationCategoryRepository;
    }

    public function store($data) {
        $this->specificationCategoryRepository->create($data);

        return redirect()
            ->route('admin.specification-categories')
            ->with('success', 'Specification category created successfully');
    }

}
