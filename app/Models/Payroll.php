<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
   
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */

}
