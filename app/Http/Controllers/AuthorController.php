<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\AuthorModel;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
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

        $author = AuthorModel::where('username', $credentials['username'])->first();

        if ($author->status == 0) return back()->with('loginError', 'Akun anda ditangguhkan!');

        if (Auth::guard('author')->attempt($credentials)) {
            $request->session()->put('ROLE', 'AUTHOR');
            $request->session()->regenerate();

            return redirect()->intended('/author/dashboard');
        }

        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $author = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status' => 1
        ];

        AuthorModel::create($author);

        $request->session()->flash('success', 'Berhasil Mendaftar!');

        return redirect('/author/');
    }

    public function getAll(Request $request)
    {
        $articles = ArticleModel::where('id_penulis', Auth::guard('author')->user()->id)->get();
        return view('author.list', compact('articles'));
    }

    public function getById(Request $request)
    {
        $id = $request->query('id');
        if ($id == null) return redirect('/author/article');

        $article = ArticleModel::where('id', $id)->first();
        if ($article == null) return redirect('/author/article');

        return view('author.edit', compact('article'));
    }

    public function store(Request $request)
    {
        $article = new ArticleModel();
        $article->judul_artikel = $request->input('title');
        $article->isi_artikel = $request->input('body');
        $article->id_penulis = Auth::guard('author')->user()->id;
        $article->tanggal = (new DateTime())->format('Y-m-d');
        $article->save();

        $request->session()->flash('success', 'Berhasil Membuat Artikel!');

        return redirect('/author/add-article');
    }

    public function update(Request $request)
    {
        DB::table('tb_artikel')
            ->where('id', $request->input('id'))
            ->update([
                'judul_artikel' => $request->input('title'),
                'isi_artikel' => $request->input('body'),
            ]);

        $request->session()->flash('success', 'Berhasil memperbarui Artikel!');

        return redirect('/author/article');
    }

    public function delete(Request $request)
    {
        $id = $request->query('id');
        if ($id == null) return redirect('/author/article');

        ArticleModel::where('id', $id)->delete();

        $request->session()->flash('success', 'Berhasil menghapus Artikel!');

        return redirect('/author/article');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ROLE');
        Auth::guard('author')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/author');
    }
}
