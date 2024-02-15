<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NidCard extends Model
{
    use HasFactory;
    protected $gurged = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
