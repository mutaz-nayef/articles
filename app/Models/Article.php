<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use HasFactory;

    protected $guarded = [];

//protected $fillable = ['title','excerpt','body']; // User::create(request()->all()// ['name' => 'newmame','subscriber'=> true];
    public function path()
    {
        return route('articles.show', $this);
    }

    public function author() // if you want to change fun name you have to put the foreign key
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
        // if you want to override the time which not included
    }

}

