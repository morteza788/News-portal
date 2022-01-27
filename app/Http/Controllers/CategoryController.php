<?php


namespace App\Http\Controllers;

use App\Models\Category;


class CategoryController extends AdminController
{
    public function index()
    {
        $categories =  Category::all();
        return view("admin.category.index", compact('categories'));
    }

    public function create()
    {
        $categories = Category::create();
        return view("admin.category.create", compact('categories'));
    }


    public function store($request)
    {
        $category = Category::insert($request);
        success('success', 'دسته بندی با موفقیت ذخیره شد');
        return redirect('admin/category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view("admin.category.edit", compact('category'));
    }

    public function update($request, $id)
    {
        $category = Category::update($request, $id);
        return redirect('admin/category');
    }


    public function destroy($id)
    {
        $category = Category::delete($id);
        error('error', 'دسته بندی با موفقیت حذف شد');
        return redirectBack();
    }
}
