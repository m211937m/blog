<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interaction;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'paragraph_1',
        'paragraph_2',
        'paragraph_3',
        'img_1',
        'img_2',
        'categore_id',
        'publisher_id',
        'type',
    ];
    public function interaction(){

        return $this->hasMany(Interaction::class);
    }
    public function categore(){
        return $this->belongsTo(Categore::class);
    }
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
