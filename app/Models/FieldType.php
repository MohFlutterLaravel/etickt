<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
