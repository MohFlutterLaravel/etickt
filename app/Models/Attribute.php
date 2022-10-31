<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['field_name', 'field_type_id', 'field_category_id'];

    public function fieldCategory()
    {
        return $this->belongsTo(FieldCategory::class);
    }

    public function fieldType()
    {
        return $this->belongsTo(FieldType::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_attribute');
    }
}
