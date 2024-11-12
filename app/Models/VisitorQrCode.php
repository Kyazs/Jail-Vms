<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorQrCode extends Model
{
    protected $table = 'visitor_qr_code';

    protected $fillable = [
        'visitor_id',
        'qr_code',
        'is_deleted',
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
