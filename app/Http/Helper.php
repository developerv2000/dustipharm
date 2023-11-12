<?php

/**
 * Custom Helper functions
 *
 * @author Bobur Nuridinov <bobnuridinov@gmail.com>
 */

use App\Models\Advantage;
use App\Models\Drugstore;
use App\Models\Mission;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Value;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;


/**
 * Transliterate string from any other language into latin
 *
 * @param string $string
 */
function transliterateIntoLatin($string): string
{
  $search = [
    'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
    'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
    'ӣ', 'ӯ', 'ҳ', 'қ', 'ҷ', 'ғ',
    ' ', '_'
  ];

  $replace = [
    'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
    'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shb', 'a', 'i', 'y', 'e', 'yu', 'ya',
    'i', 'u', 'h', 'q', 'j', 'g',
    '-', '-'
  ];

  // remove tags and lowercase it
  $string = strip_tags($string);

  // lowercase
  $string = mb_strtolower($string);

  // manual transilation
  $transilation = str_replace($search, $replace, $string);

  // additional Laravel transilation of unsupported characters
  $transilation = Str::ascii($transilation);

  return $transilation;
}

/**
 * Generate unique slug for the given model
 *
 * @param string $string Generates slug from given string
 * @param string $model Model Classname with full namespace
 * @param integer $ignoreId ignore slug of a model with a given id (used while updating model)
 * @return string
 */
function generateUniqueSlug($model, $string, $ignoreId = null)
{
  // transliterate into latin
  $slug = transliterateIntoLatin($string);

  // remove unwanted characters
  $slug = preg_replace('~[^-\w]+~', '', $slug);

  // remove repeating dividers
  $slug = preg_replace('~-+~', '-', $slug);

  // trim dividers
  $slug = trim($slug, '-');

  // escape duplicate slug
  $counter = 1;
  $originalSlug = $slug;

  while ($model::where('slug', $slug)->where('id', '!=', $ignoreId)->first()) {
    $slug = $originalSlug . '-' . $counter;
    $counter++;
  }

  return $slug;
}

/**
 * remove tags, decode htmlspecialchars, trim and remove whitespaces
 * cut string if length given
 * and return clean text
 *
 * used while sharing in socials/messangers
 *
 * @param string $string
 * @param integer $length
 * @return string
 */
function cleanText($string, $length = null)
{
  $cleaned = preg_replace('#<[^>]+>#', ' ', $string); // remove tags
  $cleaned = htmlspecialchars_decode($cleaned); // decode htmlspecialchars
  $cleaned = str_replace('&nbsp;', ' ', $cleaned); // &nbsp to space
  $cleaned = preg_replace('!\s+!', ' ', $cleaned); // many spaces into one
  $cleaned = trim($cleaned); // remove whitespaces

  if ($length) {
    $cleaned = mb_strlen($cleaned) < $length ? $cleaned : mb_substr($cleaned, 0, ($length - 4)) . '...'; // cut length
  }

  return $cleaned;
}

/**
 * remove tags, decode htmlspecialchars, trim and remove whitespaces
 * cut string if length given
 * and return clean text
 *
 * used while sharing in socials/messangers
 *
 * @param string $string
 * @return string
 */
function generateShareText($string)
{
  $cleaned = preg_replace('#<[^>]+>#', ' ', $string); //remove tags
  $cleaned = htmlspecialchars_decode($cleaned); // decode htmlspecialchars
  $cleaned = str_replace('&nbsp;', ' ', $cleaned); // &nbsp to space
  $cleaned = preg_replace('!\s+!', ' ', $cleaned); // many spaces into one
  $cleaned = trim($cleaned); // remove whitespaces
  $cleaned = mb_strlen($cleaned) < 160 ? $cleaned : mb_substr($cleaned, 0, 156) . '...'; //cut length

  return $cleaned;
}

/**
 * Return reversed order type
 *
 * used only in dashboard
 *
 * @param string $orderType
 * @return string
 */
function reverseOrderType($orderType)
{
  return $orderType == 'asc' ? 'desc' : 'asc';
}

/**
 * Fill Eloquent Model Items fields from request by loop. Used while storing & updating Eloquent Model item
 *
 * @param \Http\Request $request
 * @param \Eloquent\Model $model
 * @param array $fields
 * @return void
 */
function fillModelColumns($model, $fields, $request,)
{
  foreach ($fields as $field) {
    $model[$field] = $request[$field];
  }
}

/**
 * Upload models file & update models column. Images can be resized after upload
 *
 * Resizing (Only Images) works only if width or height is given
 * Image will be croped from the center, If both width and height are given (fit)
 * Else if one of the parameters is given (width or height), another will be calculated auto (aspectRatio)
 *
 * @param \Http\Request $request
 * @param \Eloquent\Model\ $model
 * @param string $column Requested file input name and Models column name
 * @param string $name Name for newly creating file
 * @param string $path Path to store
 * @param integer $width Width for resize
 * @param integer $height Height for resize
 * @return void
 */
function uploadModelsFile($request, $model, $column, $name, $path, $width = null, $height = null)
{
  // Any file input maybe nullable on model update
  $file = $request->file($column);
  if ($file) {
    // shorten filename length
    if (mb_strlen($name) > 60) {
      $name = mb_substr($name, 0, 60);
      $name = trim($name);
    }

    $filename = $name . '.' . $file->getClientOriginalExtension();
    $filename = renameIfFileAlreadyExists($filename, $path);

    $fullPath = public_path($path);

    $file->move($fullPath, $filename);
    $model[$column] = $filename;

    //resize image
    if ($width || $height) {
      $image = Image::make($fullPath . '/' . $filename);

      // fit
      if ($width && $height) {
        $image->fit($width, $height, function ($constraint) {
          $constraint->upsize();
        }, 'center');

        // aspect ratio
      } else {
        $image->resize($width, $height, function ($constraint) {
          $constraint->aspectRatio();
        });
      }

      $image->save($fullPath . '/' . $filename);
    }
  }
}

/**
 * Make thumb from original and store it in thumbs folder
 * Image will be croped from the center, If both width and height are given (fit)
 * Else if one of the parameters is given (width or height), another will be calculated auto (aspectRatio)
 * Thumbs will be saved in original-path/thumbs folder
 *
 * ---WARNING---
 * To escape errors, thumbs folder must exist in original path
 *
 * @param string $path Path of original image
 * @param string $filename Name of original image
 * @param integer $width Width of thumb in pixels
 * @param integer $height Height of thumb in pixels
 * @return void
 */
function createThumb($path, $filename, $width = 400, $height = null)
{
  $fullPath = public_path($path);
  $thumb = Image::make($fullPath . '/' . $filename);

  // fit
  if ($width && $height) {
    $thumb->fit($width, $height, function ($constraint) {
      $constraint->upsize();
    }, 'center');

    // aspect ration
  } else {
    $thumb->resize($width, $height, function ($constraint) {
      $constraint->aspectRatio();
    });
  }

  $thumb->save($fullPath . '/thumbs//' . $filename);
}

/**
 * Rename file if file with the given name is already exists on the given folder
 * Renaming type => oldName(i+1)
 *
 * @param string $filename
 * @param string $path
 * @return string
 */
function renameIfFileAlreadyExists($filename, $path)
{
  $name = pathinfo($filename, PATHINFO_FILENAME);
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  $fullPath = public_path($path) . '/';

  $counter = 1;
  $originalName = $name;

  while (file_exists($fullPath . $filename)) {
    $name = $originalName . '(' . $counter . ')';
    $filename = $name . '.' . $extension;
    $counter++;
  }

  return $filename;
}

/**
 * Convert next lines to <br>
 */
function customNl2br($string)
{
  return preg_replace("/\r\n|\r|\n/", '<br/>', $string);
}

/**
 * Convert <br> tags into \r\n
 */
function customBr2nl($string)
{
  return preg_replace('/<br\s?\/?>/i', "\r\n", $string);
}

/**
 * Returns Models tag of the current route
 * Shared with all dashboard views by AppServiceProvider
 *
 * used only in dashboard
 *
 * @return string
 */
function getModelTag()
{
  $route = Route::currentRouteName();
  $modelTag = 'undefined';

  if (strpos($route, 'advantages') !== false) {
    return Advantage::$tag;
  }

  if (strpos($route, 'drugstores') !== false) {
    return Drugstore::$tag;
  }

  if (strpos($route, 'missions') !== false) {
    return Mission::$tag;
  }

  if (strpos($route, 'partners') !== false) {
    return Partner::$tag;
  }

  if (strpos($route, 'services') !== false) {
    return Service::$tag;
  }

  if (strpos($route, 'values') !== false) {
    return Value::$tag;
  }

  return $modelTag;
}
