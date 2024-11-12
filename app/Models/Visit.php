<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * The Visit model represents a visit record in the Jail-VMS system.
     * 
     * @property string $table The name of the table associated with the model.
     * @property array $fillable The attributes that are mass assignable.
     * @property bool $timestamps Indicates if the model should be timestamped.
     * 
     * @method belongsTo(Visitor::class, 'visitor_id') visitor() Defines a relationship where a visit belongs to a visitor.
     * @method belongsTo(Inmate::class, 'inmate_id') inmate() Defines a relationship where a visit belongs to an inmate.
     * @method belongsTo(VisitStatus::class, 'status_id') visitStatus() Defines a relationship where a visit belongs to a visit status.
     */

    protected $table = 'Visits';

    protected $fillable = [
        'visitor_id',
        'inmate_id',
        'check_in_time',
        'check_out_time',
        'status_id',
        'visit_duration'
    ];

    public $timestamps = false;
    
    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }

    public function inmate()
    {
        return $this->belongsTo(Inmate::class, 'inmate_id');
    }

    public function visitStatus()
    {
        return $this->belongsTo(VisitStatus::class, 'status_id');
    }
}
