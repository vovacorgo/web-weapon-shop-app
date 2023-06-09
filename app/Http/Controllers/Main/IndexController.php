<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Doctrine\DBAL\Schema\Index;
use Inertia\Inertia;

class IndexController extends Controller
{

    public function dashboard()
    {
        return Inertia::render('Index/Dashboard');
    }
    public function show(Index $index)
    {
        return Inertia::render('Index/Dashboard', [
            'user' => $index
        ]);
    }
    public function category(Category $category)
    {
        if (!count($category->subcategories)) {
            return to_route('goods.index', $category);
        }

        return inertia('Index/Category', [
            'category' => new CategoryResource($category),
            'breadcrumbs' => Category::breadcrumbs($category),
        ]);
    }
}
