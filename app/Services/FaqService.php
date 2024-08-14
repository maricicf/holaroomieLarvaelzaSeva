<?php

namespace App\Services;

use App\Repositories\Faq\FaqRepository;

class FaqService {
    protected FaqRepository $faqRepository;
    public function __construct(FaqRepository $faqRepository) {
        $this->faqRepository = $faqRepository;
    }

    public function all() {
        return $this->faqRepository->all();
    }

    public function find($id) {
        return $this->faqRepository->find($id);
    }

    public function create($data) {
        return $this->faqRepository->create($data);
    }



}
