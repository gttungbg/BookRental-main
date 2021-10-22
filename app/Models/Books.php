<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Books extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= 'books';
    protected $guarded=[];
    public function images(){
        return $this->hasMany(Book_images::class,'book_id');
    }

    public function authors(){
        return $this->belongsToMany(Authors::class,'book_authors','book_id','author_id')->withTimestamps();
    }
    public function booksImage(){
        return $this->hasMany(Book_images::class ,'book_id');
    }
}
