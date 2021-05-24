<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Subject extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    // Primary key type is of string
    protected $keyType = 'string';

    public function setPasswordAttribute($password) {
        if (trim($password) === '') {
            return;
        }
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Find the user instance for the given username.
     *
     * @param  string  $id
     * @return User
     */
    public function findForPassport($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Validate the password of the user for the Passport password grant.
     *
     * @param  string  $password
     * @return bool
     */
    public function validateForPassportPasswordGrant($password)
    {
        return Hash::check($password, $this->password);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
