<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'date_of_birth',
        'gender',
        'email',
        'mobile',
        'address',
        'linkedin_url',
        // 'image',
        // 'resume',
        'education_level',
        'subject',
        'institution',
        'result',
        'result_type',
        // 'language_skill',
        'experience_in_year',
    ];

    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => asset('public/storage/'.$value),
    //     );
    // }
    
    // protected function resume(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => asset('public/storage/'.$value),
    //     );
    // }
}
