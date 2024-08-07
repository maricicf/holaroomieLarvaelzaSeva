<?php

namespace App\Services;

use App\Repositories\User\UserRepository;

class UserService {

    public function __construct(
        protected UserRepository $userRepository
    ) {}

    public function all() {
        return $this->userRepository->all();
    }

    public function find($id) {
        return $this->userRepository->find($id);
    }

    public function create($data) {
        return $this->userRepository->create($data);
    }

    public function update($id, $data) {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->userRepository->delete($id);
    }

}
