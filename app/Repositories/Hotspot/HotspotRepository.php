<?php

namespace App\Repositories\Hotspot;

use App\Models\Hotspot;
use App\Repositories\IResourceRepository;

class HotspotRepository implements IResourceRepository {

    public function store($data) {
        try {
            $hotspot = new Hotspot();
            $hotspot->name = $data['name'];
            $hotspot->save();
            return $hotspot;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function all() {
        // TODO: Implement all() method.
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        // TODO: Implement create() method.
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        try {
            $hotspot = Hotspot::find($id);
            $hotspot->delete();
            return $hotspot;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
