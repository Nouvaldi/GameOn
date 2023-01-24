<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function spec() {
        return $this->belongsTo(Spec::class, 'spec_id');
    }

    public function library() {
        return $this->hasMany(Library::class);
    }
}
