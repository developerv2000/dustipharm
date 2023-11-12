<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $filename = ['63dca73c2ca85.png', '63dca15422a66.png', '63dca15425ca3.png', '63dca6506581e.png', '63dcdf174ee24.png', '63dce0ed4b590.png', '63dce0f34d108.png', '63dce0f84bf90.png'];
    $drugstore_id = [1,2,3,4,1,2,3,4];

    for ($i=0; $i<count($filename); $i++)
    {
      $gallery = new Gallery();
      $gallery->filename = $filename[$i];
      $gallery->drugstore_id = $drugstore_id[$i];
      $gallery->save();
    }
  }
}
