<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemuRequest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'company_name', 'company_size', 'module', 'region', 'status','service', 'message'];
}
