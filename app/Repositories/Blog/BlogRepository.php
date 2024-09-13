<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\IResourceRepository;

class BlogRepository implements IResourceRepository {

    public function all() {
        return Blog::with('category')->get();
    }

    public function find($id) {
        return Blog::with('category')->find($id);
    }

    public function create($data) {
        try {
            $newBlog = new Blog();

            $newBlog->title = $data['title'];
            $newBlog->content = $data['content'];
            $newBlog->blog_category_id = $data['blog_category_id'];

            $image = $data['image'][0];

            $hashedName = $image->hashName();

            $newBlog->image = $hashedName;

            // store image in storage
            if (!$image->move(public_path('assets/images/blogs'),
                $hashedName)) {
                // Log the error or handle it
                throw new \Exception("Failed to move the image: ".$image->getClientOriginalName());
            }

            $newBlog->save();

            return $newBlog->id;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update($id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($id) {
        // TODO: Implement delete() method.
    }

}
