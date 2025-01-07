<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VisitorCredential extends Authenticatable implements MustVerifyEmail
{
    protected $table = 'visitor_credentials';

    protected $fillable = [
        'visitor_id',
        'username',
        'password',
        'is_deleted',
    ];

    public $timestamps = false;

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}