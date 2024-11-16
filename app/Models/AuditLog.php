<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table = 'audit_log';

    protected $fillable = [
        'user_id',
        'action_type_id',
        'visitor_id',
        'inmate_id',
        'visit_id',
        'details',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function actionType()
    {
        return $this->belongsTo(ActionType::class, 'action_type_id');
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id')->withDefault();
    }

    public function inmate()
    {
        return $this->belongsTo(Inmate::class, 'inmate_id')->withDefault();
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class, 'visit_id')->withDefault();
    }
}
