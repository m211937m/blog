<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticaleRequest extends Model
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
        'is_accept',
        'type',
        'refuse_reason',
        'publisher_id',
        'article_id',

    ];
    public function publisher(){
    return $this->belongsTo(Publisher::class);
    }
}
