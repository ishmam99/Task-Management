<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
