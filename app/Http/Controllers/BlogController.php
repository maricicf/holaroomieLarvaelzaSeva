<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blogs\CreateBlogRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller {

    protected BlogService $blogService;

    public function __construct(BlogService $blogService) {
        $this->blogService = $blogService;
    }

    public function store(CreateBlogRequest $request) {
        return $this->blogService->store($request->all());
    }

}
