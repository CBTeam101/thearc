<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'is_parent',
        'icon'
    ];

    public function submenu()
    {
        return $this->hasMany($this, 'id', 'parent_id');
    }
}
