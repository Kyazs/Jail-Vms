<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        // List all fillable columns here (for security)
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'gender_id',
        'date_of_birth',
        'country',
        'address_street',
        'address_city',
        'address_province',
        'address_barangay',
        'address_zip',
        'id_type',
        'id_document_path',
        'is_verified',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class); // Visitor belongs to one Gender
    }

    public function idType() //Adjusted for consistency
    {
        return $this->belongsTo(IdType::class); // Visitor belongs to one IdType
    }

    public function credentials()
    {
        return $this->hasOne(VisitorCredential::class); // Visitor has one credential
    }

    public function qrCode()
    {
        return $this->hasOne(VisitorQrCode::class);  // Visitor has one QR code
    }

    public function visits()
    {
        return $this->hasMany(Visit::class); // Visitor has many visits
    }

    public function blacklist()
    {
        return $this->hasOne(Blacklist::class); // Visitor can be on one blacklist entry
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }
}
