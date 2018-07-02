<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }
}
