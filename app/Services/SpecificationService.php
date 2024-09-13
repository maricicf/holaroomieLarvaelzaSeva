<?php

namespace App\Services;

use App\Repositories\Specification\SpecificationRepository;

class SpecificationService {

    protected SpecificationRepository $specificationRepository;

    public function __construct(SpecificationRepository $specificationRepository
    ) {
        $this->specificationRepository = $specificationRepository;
    }

    public function create($data) {
        try {
            $this->specificationRepository->create($data);
            return redirect()
                ->route('admin.utilities')
                ->with('success', 'Specification created successfully');
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->specificationRepository->delete($id);
            return redirect()
                ->route('admin.utilities')
                ->with('success', 'Specification deleted successfully');
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}
