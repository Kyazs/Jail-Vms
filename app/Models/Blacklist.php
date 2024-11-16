<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $table = 'Blacklist';

    protected $fillable = [
        'visitor_id',
        'reason',
        'blacklist_date',
        'is_deleted'
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
