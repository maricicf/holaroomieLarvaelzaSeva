<?php

namespace App\Services;

use App\Repositories\Blog\BlogRepository;

class BlogService {

    protected BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository) {
        $this->blogRepository = $blogRepository;
    }

    public function store($request) {
        $this->blogRepository->create($request);
        return redirect()
            ->route('admin.blog')
            ->with('success', 'Blog created successfully');
    }

}
