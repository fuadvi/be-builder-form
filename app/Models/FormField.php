<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'component' => 'array'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
