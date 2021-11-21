<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Firm;
use App\Models\Employment;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function firms()
    {
        return $this->belongsToMany(Firm::class, 'employments')->withTimestamps();
    }
    public function employments()
    {
        return $this->hasMany(Employment::class);
    }

}
