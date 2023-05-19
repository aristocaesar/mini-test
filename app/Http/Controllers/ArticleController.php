<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;
use App\Models\CommentDetailModel;
use App\Models\CommentModel;

class ArticleController extends Controller
{
    public function getAll()
    {
        $articles = ArticleModel::all();
        return view('index', compact('articles'));
    }

    public function getById($id)
    {
        $article = ArticleModel::with('penulis')->find($id);

        $comments = CommentDetailModel::findByArticle($id);

        return view('single', compact('id', 'article', 'comments'));
    }

    public function comment(Request $request, $id)
    {
        $comment = new CommentModel();
        $comment->nama = $request->input('nama');
        $comment->isi_komentar = $request->input('isi_komentar');
        $comment->email = $request->input('email');
        $comment->save();

        $result = $comment->refresh();

        $commentDetail = new CommentDetailModel();
        $commentDetail->id_artikel = $id;
        $commentDetail->id_komentar = $result->id;
        $commentDetail->save();

        return redirect()->route('news.show', ['id' => $id]);
    }
}
