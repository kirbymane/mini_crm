<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo'
    ];

    public function getLogoAttribute($value) {
        return asset($value?: 'img/default.jpeg');
    }

    public function employeeList() {
        return $this->employee->all();
    }
}
