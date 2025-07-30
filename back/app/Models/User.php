<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\Auth\CustomVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'last_login_at' => 'datetime',
            'deleted_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user is admin
     * 
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Relation user with admin
     * 
     * @return [type]
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * Check if user is agency
     * 
     * @return bool
     */
    public function isAgency(): bool
    {
        return $this->role === 'agency';
    }

    /**
     * Relation user with agency
     * 
     * @return [type]
     */
    public function agency()
    {
        return $this->hasOne(Agency::class);
    }

    /**
     * Check if user is promoter
     * 
     * @return bool
     */
    public function isPromoter(): bool
    {
        return $this->role === 'promoter';
    }

    /**
     * Relation user with promoter
     * 
     * @return [type]
     */
    public function promoter()
    {
        return $this->hasOne(Promoter::class);
    }

    /**
     * Check if user is visitor
     * 
     * @return bool
     */
    public function isVisitor(): bool
    {
        return $this->role === 'visitor';
    }

    /**
     * Relation user with visitor
     * 
     * @return [type]
     */
    public function visitor()
    {
        return $this->hasOne(Visitor::class);
    }

    /**
     * @return [type]
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }

    /**
     * Assign role for user
     * 
     * @return [type]
     */
    public function getRoleAttribute()
    {
        return $this->attributes['role'];
    }
}
