<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
  public $timestamps = false;
  public static $tag = 'advantages';
  protected $fillable = ['title', 'body'];

  use HasFactory;
}
