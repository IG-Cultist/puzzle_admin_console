<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = [ //更新しないカラムを指定 idなどのauto_incrementのついているもの
        'id'
    ];

    public function items()
    {
        return $this->belongsToMany(
            Item::class, 'user_items',
            'user_id',
            'item_id')
            ->withPivot('item_num');
    }

    public function mails()
    {
        return $this->belongsToMany(
            Mail::class, 'user_mails',
            'user_id',
            'mail_id')
            ->withPivot('isOpen');
    }

    public function follows()
    { #フォロー数
        return $this->hasMany(Follow::class);
    }

    public function followers()
    { #フォロワー数
        return $this->hasMany(Follow::class, 'follow_id');
    }

    public function social()
    { #last_login とlocate
        return $this->hasOne(Social::class);
    }
}
