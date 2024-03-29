<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'company_id', 'email', 'phone'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public static function findByEmail($email)
    {
        return static::where(compact('email'))->first();
    }

}
