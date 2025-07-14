<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'contact_number',
        'address',
        'highest_qualification',
        'year_of_passing',
        'university_institute',
        'current_organization',
        'years_of_experience',
        'skills',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'year_of_passing' => 'integer',
        'years_of_experience' => 'integer',
    ];

    /**
     * Get the user that owns the profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get full name attribute
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
