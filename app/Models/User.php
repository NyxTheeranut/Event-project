<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_MEMBER = 'MEMBER';
    public const ROLE_STAFF = 'STAFF';
    public const ROLE_ACCOUNTANT = 'ACCOUNTANT';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'nickname',
        'email',
        'password',
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
        'email_verified_at' => 'datetime'
    ];

//    public static function create(array $array)
//    {
//        $user = new User();
//        $user->firstname = $array['firstname'];
//        $user->lastname = $array['lastname'];
//        $user->nickname = $array['nickname'];
//        $user->email = $array['email'];
//        $user->password = $array['password'];
//        $user->role = User::ROLE_MEMBER;
//
//        $user->save();
//
//        return $user;
//
//    }

    public function setPasswordAttribute($value)
    {
        if( Hash::needsRehash($value) ) {
            $value = Hash::make($value);
        }
        $this->attributes['password'] = $value;
    }

    public function isMember() : bool {
        return $this->role === User::ROLE_MEMBER;
    }

    public function isStaff() : bool {
        return $this->role === User::ROLE_STAFF;
    }

    public function  isAccountant() : bool {
        return $this->role === User::ROLE_ACCOUNTANT;
    }

    public function events() : HasMany {
        return $this->hasMany(Event::class);
    }

    public function certificates() : HasMany {
        return  $this->hasMany(Certificate::class);
    }

    public function applications() : HasMany {
        return $this->hasMany(Application::class);
    }

    public function isOrganizerOf(int $event_id) : bool {
        return $this->id === $event_id;
    }
}
