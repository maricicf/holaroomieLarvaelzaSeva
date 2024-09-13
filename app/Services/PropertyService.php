<?php

namespace App\Services;

use App\Repositories\Property\PropertyRepository;

class PropertyService {

    protected PropertyRepository $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository) {
        $this->propertyRepository = $propertyRepository;
    }

    public function all($params = []) {
        return $this->propertyRepository->all($params);
    }

    public function find($id) {
        return $this->propertyRepository->find($id);
    }

    public function create($data) {
        $this->propertyRepository->create($data);
        return redirect()
            ->route('admin.properties')
            ->with('success', 'Property created successfully');
    }

    public function delete($id) {
        $this->propertyRepository->delete($id);
        return redirect()
            ->route('admin.properties')
            ->with('success', 'Property deleted successfully');
    }

}
