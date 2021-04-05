<?php
/**
 * Created by PhpStorm.
 * User: Raihan
 * Date: 3/4/2021
 * Time: 6:26 PM
 */

namespace App\Traits;


trait StatusTrait
{
  public static function scopeActive($query) {
    return $query->where('status', 'active');
  }

  public static function scopeInactive($query) {
    return $query->where('status', 'inactive');
  }
}