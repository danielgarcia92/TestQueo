<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'website'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public static function findByEmail($email)
    {
        return static::where(compact('email'))->first();
    }

}
