<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'assigned_to', 'status', 'due_date', 'is_archived',
    ];

    protected function casts(): array
    {
        return ['due_date' => 'date', 'is_archived' => 'boolean'];
    }

    public function scopeVisible($query)
    {
        return $query->where('is_archived', false);
    }
}
