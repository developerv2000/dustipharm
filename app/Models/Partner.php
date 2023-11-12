<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  public $timestamps = false;
  public static $tag = 'partners';
  protected $fillable = ['title', 'body', 'link'];

  use HasFactory;
}
