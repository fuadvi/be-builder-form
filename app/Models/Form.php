<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Form extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::creating(static function ($model){
            $model->uuid = Str::uuid();
        });
    }

    public function fields()
    {
        return $this->hasOne(FormField::class);
    }

    public function answers()
    {
        return $this->hasMany(AnswerForms::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }


}
