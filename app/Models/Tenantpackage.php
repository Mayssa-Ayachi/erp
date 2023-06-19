<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenantpackage extends Model
{
    protected $table = 'tenantpackages';

    protected $fillable = ['teant_id',
    'tenant_package'];
}
