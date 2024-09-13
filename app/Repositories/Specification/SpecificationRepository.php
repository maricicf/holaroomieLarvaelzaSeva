<?php

namespace App\Repositories\Specification;

use App\Models\Specification;
use App\Repositories\IResourceRepository;

class SpecificationRepository implements IResourceRepository {

    public function all($props = []) {
        $specifications = Specification::all();
        if (isset($props['with'])) {
            $specifications->load($props['with']);
        }
        return $specifications;
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        $specification = new Specification();
        $specification->name = $data['name'];
        $specification->icon = $data['icon'];
        $specification->specification_category_id = $data['category_id'];

        return $specification->save();
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        try {
            $specification = Specification::findOrFail($id);
            $specification->delete();
            return TRUE;
        }
        catch (\Exception $e) {
            return FALSE;
        }
    }

}
