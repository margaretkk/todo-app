<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoModel extends Model
{
    protected $table = 'todo';

    protected $fillable = [
        'name',
        'description',
    ];
}
