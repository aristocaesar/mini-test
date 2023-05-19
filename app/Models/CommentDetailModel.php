<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentDetailModel extends Model
{
    use HasFactory;

    protected $table = 'tb_detail';

    protected $fillable = ['id_artikel', 'id_komentar'];

    public static function findByArticle($id)
    {
        return self::with('comments')->where('id_artikel', $id)->get();
    }

    public function comments()
    {
        return $this->belongsTo(CommentModel::class, 'id_komentar', 'id');
    }
}
