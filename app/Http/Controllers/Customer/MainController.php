<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Main\MainService;

class MainController extends Controller
{
    protected $categoryService;
    protected $mainService;

    public function __construct(CategoryService $categoryService, MainService $mainService) {

        $this->categoryService = $categoryService;
        $this->mainService = $mainService;
    }

    public function index() {

        $categories = $this->categoryService->getParent();
        $products = $this->mainService->getProductByNote();
        $productBestSolds = $this->mainService->getProductBestSold();


        return view('customer.main.index', compact('categories', 'products', 'productBestSolds'));
    }

    public function aboutUs() {

        $categories = $this->categoryService->getParent();
        return view('customer.main.aboutus', compact('categories'));
    }

    public function contact() {

        $categories = $this->categoryService->getParent();
        return view('customer.main.contact', compact('categories'));
    }

    public function blog() {

        $categories = $this->categoryService->getParent();
        return view('customer.main.blog', compact('categories'));
    }
}
