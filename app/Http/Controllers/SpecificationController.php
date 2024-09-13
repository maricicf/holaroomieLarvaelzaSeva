<?php

namespace App\Http\Controllers;

use App\Http\Requests\Specifications\CreateSpecificationRequest;
use App\Repositories\Specification\SpecificationRepository;
use App\Services\SpecificationService;
use Illuminate\Http\Request;

class SpecificationController extends Controller {

    protected SpecificationService $specificationService;

    public function __construct(SpecificationService $specificationService
    ) {
        $this->specificationService = $specificationService;
    }

    public function create(CreateSpecificationRequest $request) {
        return $this->specificationService->create($request->all());
    }

    public function delete($id) {
        return $this->specificationService->delete($id);
    }

}
