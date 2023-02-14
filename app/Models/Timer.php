<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'started_at',
        'ended_at',
        'duration',
        'user_id',
        'project_id',
        'invoice_line_id',
        'notes',
        'deleted_at',
    ];
}
