<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService) {

        $this->categoryService = $categoryService;
    }

    public function index() {

        $categories = $this->categoryService->getAll();

        return view('admin.category.view', ['categories' => $categories]);
    }

    public function create() {

        $categories = $this->categoryService->getParent();

        return view('admin.category.create', ['categories' => $categories]);
    }

    public function store(CreateFormRequest $request) {

        $this->categoryService->create($request);

        return redirect('admin/category/create')->with('success2','SUCCESS: New category was successfully added!');
    } 

    public function show(Category $category) {
        
        return view('admin.category.edit', [
            'category' => $category,
            'categories' => $this->categoryService->getParent()
        ]);
    }

    public function update(Request $request, Category $category) {
        
        $this->categoryService->update($request, $category);
        return redirect('admin/category')->with('success','SUCCESS: Category was successfully edited!');
    }

    public function destroy($id) {
        
        $result = $this->categoryService->destroy($id);   

        if($result) {
            return redirect('admin/category')->with('success','SUCCESS: Category was successfully deleted!');
        }
    }
}
