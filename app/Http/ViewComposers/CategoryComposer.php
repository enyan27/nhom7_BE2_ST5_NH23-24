<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Services\Category\CategoryService;
use Category;

class CategoryComposer
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function compose(View $view) {
        $categories = $this->categoryService->getParent();
        $view->with('categories', $categories);
    }
}
