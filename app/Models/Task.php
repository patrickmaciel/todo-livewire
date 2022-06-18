<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = ['user_id', 'name', 'filepath', 'file_extension', 'finished', 'remember_at', 'cost'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filename(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (empty($attributes['filepath'])) {
                    return null;
                }
                return explode('/', $attributes['filepath'])[1];
            }
        );
    }
}
