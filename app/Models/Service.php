<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  public $timestamps = false;
  public static $tag = 'services';
  protected $fillable = ['title', 'body'];

  use HasFactory;

  public function getAll()
  {
    return $this->all();
  }
}
