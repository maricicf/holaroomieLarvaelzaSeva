<?php

namespace App\Services;

use App\Repositories\Contact\ContactRepository;

class ContactService {

    protected ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository) {
        $this->contactRepository = $contactRepository;
    }

    public function store($data) {
        $this->contactRepository->create($data);
        return redirect()
            ->back()
            ->with('success', 'Message sent successfully.');
    }

    public function delete($id) {
        $this->contactRepository->delete($id);
        return redirect()
            ->back()
            ->with('success', 'Message deleted successfully.');
    }

}
