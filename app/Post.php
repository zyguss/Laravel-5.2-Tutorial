<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];
    
    // ovaj post ima jednog vlasnika, on pripada samo jednom vlasniku - belongsTo
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    // ovaj post ima jednu sliku
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    
    // ovaj post ima jednu kategoriju
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
