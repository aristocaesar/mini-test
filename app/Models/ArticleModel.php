<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    use HasFactory;

    protected $table = 'tb_artikel';

    protected $fillable = ['judu_artikel', 'isi_artikel', 'id_penulis', 'tanggal'];
}
