<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function desk()
    {
        return $this->belongsTo(Desk::class);
    }
}
