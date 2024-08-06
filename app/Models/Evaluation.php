<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
