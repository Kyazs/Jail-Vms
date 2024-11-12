<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitStatus extends Model
{
    protected $table = 'visit_status';

    protected $fillable = [
        'status_name',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class, 'status_id');
    }
}
