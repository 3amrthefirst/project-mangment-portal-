<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function WelcomeCall()
    {
        return $this->hasOne(WelcomeCall::class, 'user_id', 'id');
    }

    /**
     * Validate the password of the user for the Passport password grant.
     *
     * @param string $password
     * @throw BadRequestHttpException
     */
    public function validateForPassportPasswordGrant($password)
    {
        if (!Hash::check($password, $this->password)) {

            throw new BadRequestHttpException(Lang::get('messages.'));

        }
    }
}
