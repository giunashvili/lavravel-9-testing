<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function logo(): Attribute
    {
       return Attribute::make(
           get: fn ($value) => str_starts_with($value, 'https') ? $value : '/storage/' . $value,
       );
    }
}
