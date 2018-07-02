<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'image',
        'description'
    ];

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }
}
