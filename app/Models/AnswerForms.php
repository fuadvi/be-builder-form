<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerForms extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
      'answer' => 'array'
    ];
}
