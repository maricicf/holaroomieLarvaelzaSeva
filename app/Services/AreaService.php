<?php

namespace App\Services;

use App\Repositories\Area\AreaRepository;

class AreaService {

    protected AreaRepository $areaRepository;

    public function __construct(AreaRepository $areaRepository) {
        $this->areaRepository = $areaRepository;
    }

    public function create($data) {
        $this->areaRepository->create($data);
        return redirect()->route('admin.areas')
            ->with('success', 'Area created successfully.');
    }

    public function delete($id) {
        $this->areaRepository->delete($id);
        return redirect()->route('admin.areas')
            ->with('success', 'Area deleted successfully.');
    }

}
