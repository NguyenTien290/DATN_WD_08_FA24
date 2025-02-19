<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'user_image',
        'password',
        'role',
        'email_verified_at',
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
        'password' => 'hashed',
    ];

    public function locations()
    {
        return $this->hasMany(Locations::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function vouchers_ware()
    {
        return $this->hasOne(vouchersWare::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rooms()
    {
        return $this->hasOne(ChatRoom::class);
    }

    public function blocked_user()
    {
        return $this->hasOne(BlockedUser::class);
    }

    public function message()
    {
        return $this->hasOne(Message::class)->latest("id");
    }
    
    public function notifications()
    {
        return $this->HasMany(Notification::class);
    }
}
