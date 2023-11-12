<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  public static $tag = 'gallery';
  protected $fillabe = ['filename', 'drugstore_id'];

  const IMAGE_PATH = 'img/gallery';

  use HasFactory;

  public static function storeDrugstoreImages($images, $drugstoreId)
  {
    foreach($images as $file)
    {
      // store image with unique name
      $name = uniqid();
      $filename = $name . '.' . $file->getClientOriginalExtension();

      $fullPath = public_path(self::IMAGE_PATH);
      $file->move($fullPath, $filename);

      // resize and store resized image
      $image = \Image::make($fullPath . '/' . $filename);

      $image->fit(484, 360, function ($constraint) {
        $constraint->upsize();
      }, 'center');

      $image->save($fullPath . '/' . $filename);

      // store in database
      $gallery = new Gallery();
      $gallery->filename = $filename;
      $gallery->drugstore_id = $drugstoreId;
      $gallery->save();
    }
  }
}
