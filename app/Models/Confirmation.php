<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;

    protected $primaryKey = 'UserID';
    protected $fillable = [
        'user_id',
        'confirmed',
    ];

    protected $casts = [
        'confirmed' => 'boolean',
    ];

    public function users()
    {
        return $this->hasOne(Users::class);
    }

}
