<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'domain',
        'description',
        'phone_number',
        'email',
        'industry',
        'number_of_employees',
        'annual_revenue',
        'city',
        'zip_code',
        'country',
    ];
}
