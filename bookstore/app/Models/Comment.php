<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = ['user_id', 'book_id', 'comment'];
    public function Book(){
        return $this->belongsTo(Book::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function cus(){
        return $this->hasOne(User::class,'id','user_id');
    }



}
