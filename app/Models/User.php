<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'gender',
        'profile_pic',
        'state_id',
        'city_id',
    ];

    public function state()
{
    return $this->belongsTo(State::class, 'state_id');
}

public function city()
{
    return $this->belongsTo(City::class, 'city_id');
}

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class, 'user_hobbies');
    }
}
