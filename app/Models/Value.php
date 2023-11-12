<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
  public $timestamps = false;
  public static $tag = 'values';
  protected $fillable = ['title', 'body'];

  use HasFactory;
}
