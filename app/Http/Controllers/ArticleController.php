<?php


namespace App\Http\Controllers;

use App\Models\Article;
use System\Database\Model;
use App\Http\Services\ImageUpload;
use App\Models\Category;

class ArticleController extends AdminController
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        $db = new Model();
        $categories = $db->select('SELECT * FROM `categories` ORDER BY `id` DESC ;');
        return view('admin.article.create', compact('categories'));
    }

    public function store($request)
    {
        $request['user_id'] = 3;
        $path = "public/images/posts/";
        $request['image'] = ImageUpload::UploadImage($request['image'], $path);
//dd($request);
        Article::insert($request);
        success('success', 'پست با موفقیت ذخیره شد');
        return redirect('admin/article');
    }


    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('admin.article.edit', compact('article', 'categories'));
    }


    public function update($request, $id)
    {
        $article = Article::find($id);

        $request['user_id'] = 3;
        if(!empty($request['image']['tmp_name']))
        {
            $article['image'] = ImageUpload::remove($article['image']);

            $path = "public/images/posts/";
            $request['image'] = ImageUpload::UploadImage($request['image'], $path);
        }
        else
        {
            unset($request['image']);
        }

        //dd($request);

        Article::update($request, $id);
        return redirect('admin/article');
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        $article['image'] = ImageUpload::remove($article['image']);

        Article::delete($id);
        error('remove', 'پست بندی با موفقیت حذف شد');
        return redirectBack();
    }
}