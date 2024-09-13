<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\CreateContactRequest;
use App\Services\ContactService;

class ContactController extends Controller {

    protected ContactService $contactService;

    public function __construct(ContactService $contactService) {
        $this->contactService = $contactService;
    }

    public function store(CreateContactRequest $request) {
        $this->contactService->store($request->all());
    }

    public function delete($id) {
        $this->contactService->delete($id);
    }

}
