<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\AuthorModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->put('ROLE', 'ADMIN');
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function getAllArticle(Request $redirect)
    {
        $articles = ArticleModel::get();
        return view('admin.list', compact('articles'));
    }

    public function getById(Request $request)
    {
        $id = $request->query('id');
        if ($id == null) return redirect('/admin/article');

        $article = ArticleModel::where('id', $id)->first();
        if ($article == null) return redirect('/admin/article');

        return view('admin.edit', compact('article'));
    }

    public function getAuthor()
    {
        $authors = AuthorModel::get();
        return view('admin.author', compact('authors'));
    }

    public function blockAuthor(Request $request)
    {
        $id = $request->query('id');
        if ($id == null) return redirect('/admin/article');

        DB::table('tb_penulis')
            ->where('id', $request->input('id'))
            ->update([
                'status' => 0
            ]);

        $request->session()->flash('success', 'Berhasil memblokir penulis!');

        return redirect('/admin/list-author');
    }

    public function openAuthor(Request $request)
    {
        $id = $request->query('id');
        if ($id == null) return redirect('/admin/article');

        DB::table('tb_penulis')
            ->where('id', $request->input('id'))
            ->update([
                'status' => 1
            ]);

        $request->session()->flash('success', 'Berhasil memblokir penulis!');

        return redirect('/admin/list-author');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ROLE');
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
