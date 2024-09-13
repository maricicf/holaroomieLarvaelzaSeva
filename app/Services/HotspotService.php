<?php

namespace App\Services;

use App\Repositories\Hotspot\HotspotRepository;

class HotspotService {

    protected HotspotRepository $hotspotRepository;

    public function __construct(HotspotRepository $hotspotRepository) {
        $this->hotspotRepository = $hotspotRepository;
    }

    public function store($data) {
        $this->hotspotRepository->store($data);
        return redirect()->route('admin.hotspots')
            ->with('success', 'Hotspot created successfully.');
    }

    public function delete($id) {
        $this->hotspotRepository->delete($id);
        return redirect()->route('admin.hotspots')
            ->with('success', 'Hotspot deleted successfully.');
    }

}
