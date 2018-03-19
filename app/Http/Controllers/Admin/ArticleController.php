<?php
/**
 * Created by PhpStorm.
 * User: 10643
 * Date: 2017/6/1
 * Time: 10:31
 */

namespace App\Http\Controllers\Admin;


use App\Articles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return view('admin/article/index')->withArticles(Articles::all());
    }

    public function create() {
        return view('admin/article/create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body'  => 'required'
        ]);

        $articles = new Articles();
        $articles->title = $request->get('title');
        $articles->body = $request->get('body');
        $articles->user_id = $request->user()->id;

        if($articles->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }

    public function edit($id) {
        return view('admin/article/edit')->withArticle(Articles::find($id));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body'  => 'required'
        ]);

        $article = Articles::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        if($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败!');
        }
    }

    public function destroy($id) {
        Articles::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('刪除成功!');
    }
}