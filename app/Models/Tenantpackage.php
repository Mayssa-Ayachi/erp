<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenantpackage extends Model
{
    protected $connection = 'erp';
    protected $table = 'tenantpackages';

    protected $fillable = ['tenant_id',
    'tenant_package',
    'tenant_email'];
}
