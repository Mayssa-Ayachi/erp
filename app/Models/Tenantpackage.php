<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenantpackage extends Model
{
    protected $table = 'tenantpackages';

    protected $fillable = ['tenant_id',
    'tenant_package',
    'tenant_email'];
}
