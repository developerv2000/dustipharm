<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drugstore extends Model
{
  public static $tag = 'drugstores';
  protected $fillabe = ['title', 'working_hours', 'working_days', 'phone', 'email'];

  use HasFactory;

  public function gallery()
  {
    return $this->hasMany(Gallery::class);
  }

  /**
   * The "booted" method of the model.
   *
   * @return void
   */
  protected static function booted()
  {
    // Delete model relations while removing item
    static::deleting(function ($item) {
      $item->gallery()->each(function ($image) {
        $image->delete();
      });
    });
  }
}
