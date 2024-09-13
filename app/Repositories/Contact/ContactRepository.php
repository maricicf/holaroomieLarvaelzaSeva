<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Repositories\IResourceRepository;

class ContactRepository implements IResourceRepository {

    public function all() {
        // TODO: Implement all() method.
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        return Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        Contact::destroy($id);
    }

}
