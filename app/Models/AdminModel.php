<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class AdminModel extends Model
{
    use HasFactory;

    use HasTimestamps;

    protected $table = 'tb_admin';

    protected $fillable = ['username', 'password'];
}
