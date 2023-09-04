<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $append = ['name'];
    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
    public function postings()
    {
        return $this->hasMany(EmployeePosting::class);
    }
    public function educations()
    {
        return $this->hasMany(EmployeeEducation::class);
    }
    public function trainings()
    {
        return $this->hasMany(EmployeeTraining::class);

    }
    public function childrens()
    {
        return $this->hasMany(Children::class);
    }
    public function info()
    {
        return $this->hasOne(EmployeeInfo::class);
    }
}
