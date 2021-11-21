<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Employment;
use Illuminate\Notifications\Notifiable;

class Firm extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employments')->withTimestamps();
    }

    public function employments()
    {
        return $this->hasMany(Employment::class);
    }
}
