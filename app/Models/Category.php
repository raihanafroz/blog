<?php

namespace App\Models;

use App\Traits\StatusTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, StatusTrait;

    protected $table = 'categories';

    protected $fillable = [
      'u_id',
      'name',
      'status',
    ];
}
