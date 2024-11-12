<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'Roles';

    protected $primaryKey = 'role_id';

    public $timestamps = false;

    protected $fillable = [
        'role_name',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'role_id', 'role_id');
    }
}
