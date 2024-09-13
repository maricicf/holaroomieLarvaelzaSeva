<?php

namespace App\Repositories\Area;

use App\Models\Area;
use App\Repositories\IResourceRepository;

class AreaRepository implements IResourceRepository {

    public function all() {
        // TODO: Implement all() method.
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        try {
            $area = new Area();
            $area->name = $data['name'];
            $area->city_id = $data['city_id'];
            $area->save();
            return $area;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        try {
            $area = Area::find($id);
            $area->delete();
            return $area;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
