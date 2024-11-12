<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorCredential extends Model
{
    protected $table = 'visitor_credentials';

    protected $fillable = [
        'visitor_id',
        'username',
        'password_hash',
        'is_deleted',
    ];

    public $timestamps = false;

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
