<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHotspotRequest;
use App\Services\HotspotService;
use Illuminate\Http\Request;

class HotspotController extends Controller {

    protected HotspotService $hotspotService;

    public function __construct(HotspotService $hotspotService) {
        $this->hotspotService = $hotspotService;
    }

    public function store(CreateHotspotRequest $request) {
        return $this->hotspotService->store($request->validated());
    }

    public function delete($id) {
        return $this->hotspotService->delete($id);
    }

}
