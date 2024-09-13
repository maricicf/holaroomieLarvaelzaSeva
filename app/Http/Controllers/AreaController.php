<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\CreateAreaRequest;
use App\Services\AreaService;
use Illuminate\Http\Request;

class AreaController extends Controller {

    protected AreaService $areaService;

    public function __construct(AreaService $areaService) {
        $this->areaService = $areaService;
    }

    public function store(CreateAreaRequest $request) {
        return $this->areaService->create($request->validated());
    }

    public function delete($id) {
        return $this->areaService->delete($id);
    }

}
