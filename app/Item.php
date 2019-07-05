<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['code', 'name', 'url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }

    public function want_users()  //wantのみのUser一覧を取得
    {
        return $this->users()->where('type', 'want');  //中身絞り込み
    }
    
    public function have_users()  //haveのみのUser一覧を取得
    {
        return $this->users()->where('type', 'have');  //中身絞り込み
    }
}
