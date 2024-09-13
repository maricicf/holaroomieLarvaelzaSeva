<?php

namespace App\Repositories\SpecificationCategory;

use App\Models\SpecificationCategory;
use App\Repositories\IResourceRepository;

class SpecificationCategoryRepository implements IResourceRepository {

    public function all($props = []) {
        $categories = SpecificationCategory::all();
        if (isset($props['with'])) {
            $categories->load($props['with']);
        }
        return $categories;
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        try {
            $newCategory = new SpecificationCategory();
            $newCategory->name = $data['name'];
            $newCategory->icon = $data['icon'];
            $newCategory->is_showcase = $data['is_single_answer'];

            if ($newCategory->save()) {
                return $newCategory;
            }
            throw new \Exception('Failed to create category');
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        // TODO: Implement delete() method.
    }

}
