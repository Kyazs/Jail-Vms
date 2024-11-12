<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'gender_name',
    ];

    public function visitors()
    {
        return $this->hasMany(Visitor::class); // a gender can have many visitors
    }
}
