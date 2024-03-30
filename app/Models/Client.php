<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['firstName', 'lastName', 'address', 'phoneNumber', 'userID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
