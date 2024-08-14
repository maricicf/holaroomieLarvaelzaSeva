<?php

namespace App\Http\Controllers;

use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller {

    protected FaqService $faqService;

    public function __construct(FaqService $faqService) {
        $this->faqService = $faqService;
    }

    public function all() {
        return $this->faqService->all();
    }

    public function create(Request $data) {
        return $this->faqService->create($data);
    }

}
