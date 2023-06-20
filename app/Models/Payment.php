<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = ['tenant_id',
    'package',
    'paid',
    'type',
    'start_access',
    'end_access'];
}

