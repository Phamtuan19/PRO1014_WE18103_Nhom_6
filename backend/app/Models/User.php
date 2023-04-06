<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'image_url',
        'image_public_id',
        'position_id',
        'password',
        'is_deleted',
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

    public function queryAdmin($query, $orderBy = null, $orderType = null, $isDelete = null)
    {

        if (empty($orderBy)) {
            $orderBy = 'created_at';
        }

        if (empty($orderType)) {
            $orderType = "DESC";
        }

        if(empty($isDelete)){
            $query = $query->whereNull('is_deleted');
        }else {
            $query = $query->whereNotNull('is_deleted');
        }

        // dd($orderType);
        $query = $query->where('position_id', '!=', 3)
            ->orderBy($orderBy, $orderType);

        return $query;
    }

    public function queryCustomer($query, $orderBy = null, $orderType = null, $isDelete = null)
    {

        if (empty($orderBy)) {
            $orderBy = 'created_at';
        }

        if (empty($orderType)) {
            $orderType = "DESC";
        }

        if(empty($isDelete)){
            $query = $query->whereNull('is_deleted');
        }else {
            $query = $query->whereNotNull('is_deleted');
        }

        // dd($orderType);
        $query = $query->where('position_id', 3)
            ->orderBy($orderBy, $orderType);

        return $query;
    }

    public function positions()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function product () {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
