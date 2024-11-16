<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdType extends Model
{
    protected $table = 'id_types';

    protected $fillable = [
        'id_type_name',
    ];

    public function visitors()
    {
        return $this->hasMany(Visitor::class); // an id type can have many visitors
    }
}
