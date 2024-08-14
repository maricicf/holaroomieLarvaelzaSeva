<?php

namespace App\Repositories\Faq;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Repositories\IResourceRepository;

class FaqRepository implements IResourceRepository {

    public function all() {
        return FaqCategory::with('faqs')->get();
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        Faq::factory(12)->create();
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        // TODO: Implement delete() method.
    }

}
