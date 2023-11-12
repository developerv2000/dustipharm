<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
  public $timestamps = false;
  public static $tag = 'missions';
  protected $guarded = ['id'];

  use HasFactory;
}
