<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function uniteEnseignement()
    {
        return $this->belongsTo(UniteEnseignement::class);
    }
}
