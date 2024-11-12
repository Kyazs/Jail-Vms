<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionType extends Model
{
    protected $fillable = [
        'action_type_name',
    ];

    protected $table = 'action_types';

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class, 'action_type_id');
    }
}
