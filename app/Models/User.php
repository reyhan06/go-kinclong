<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Book;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'type',
        'email',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Admin type.
     *
     * @var string
     */
    const ADMIN_TYPE = 'admin';

    /**
     * Custome type.
     *
     * @var string
     */
    const CUSTOMER_TYPE = 'customer';

    /**
     * Get the books for the user.
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'customer_id', 'id');
    }

    /**
     * Get Admin
     *
     * @return User
     */
    public static function getAdmin()
    {
        return self::findOrFail(1);
    }

    /**
     * Determine if the user is a customer
     *
     * @return bool
     */
    public function isCustomer()
    {
        return $this->type === 'customer';
    }

    /**
     * Determine if the user can do all actions
     *
     * @return bool
     */
    public function grantAllActions()
    {
        return $this->type === 'admin' ? true : null;
    }
}
