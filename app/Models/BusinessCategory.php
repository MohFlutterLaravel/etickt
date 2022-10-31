<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    public function businessAccounts()
    {
        return $this->hasMany(BusinessAccount::class);
    }
}
