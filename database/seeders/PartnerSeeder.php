<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $items = [
      [
        'title' => 'Sanofi',
        'body' => 'Экспортёр лекарственных препаратов.',
        'link' => 'https://evolet.tj'
      ],

      [
        'title' => 'Sandoz',
        'body' => 'Экспортёр лекарственных препаратов.',
        'link' => 'https://evolet.tj'
      ],

      [
        'title' => 'Bionorica',
        'body' => 'Экспортёр лекарственных препаратов.',
        'link' => 'https://evolet.tj'
      ],

      [
        'title' => 'Букаев',
        'body' => 'Экспортёр лекарственных препаратов.',
        'link' => 'https://evolet.tj'
      ],

      [
        'title' => 'Takeda',
        'body' => 'Экспортёр лекарственных препаратов.',
        'link' => 'https://evolet.tj'
      ],

      [
        'title' => 'Octa Pharma',
        'body' => 'Экспортёр лекарственных препаратов.',
        'link' => 'https://evolet.tj'
      ],

      [
        'title' => 'Apharma',
        'body' => 'Экспортёр лекарственных препаратов',
        'link' => 'https://evolet.tj'
      ],
    ];

    foreach ($items as $item) {
      Partner::create($item);
    }

    Partner::get()->each(function ($item) {
      $item->image = transliterateIntoLatin($item->title) . '.png';
      $item->save();
    });
  }
}
