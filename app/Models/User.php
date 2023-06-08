<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use CrudTrait;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Billable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'status',
        'email',
        'email_verified_at',
        'phone',
        'password',
        'trial_ends_at',
    ];
    public const ADMIN_EMAIL = 'himpolink@gmail.com';

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
    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function socials(): HasMany
    {
        return $this->hasMany(UserSocial::class);
    }

    public function orderRecipients(): HasMany
    {
        return $this->hasMany(OrderRecipient::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function goods(): HasMany
    {
        return $this->hasMany(Good::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function canAccessFilament(): bool
    {
        return $this->email === $this::ADMIN_EMAIL && $this->hasVerifiedEmail();
    }
//    public function name(): Attribute
//    {
//        return Attribute::get(fn ($value) => $this->name);
//    }

    public function getName(): string
    {
        return $this->name;
    }
}
