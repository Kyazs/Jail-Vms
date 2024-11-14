<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inmate extends Model
{
    protected $table = 'Inmates';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender_id',
        'inmate_number',
        'cell_number',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
