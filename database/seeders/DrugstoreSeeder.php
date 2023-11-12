<?php

namespace Database\Seeders;

use App\Models\Drugstore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DrugstoreSeeder extends Seeder
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
        'title' => 'Аптека №1',
        'working_hours' => '08:00 - 20:00',
        'working_days' => 'понедельник - суббота',
        'phone' => '+992 918 00 00 00',
        'email' => 'nm@dustipharma.com',
        'x_coordinates' => '38.5777887224577',
        'y_coordinates' => '68.75266134557997'
      ],

      [
        'title' => 'Аптека №2',
        'working_hours' => '08:00 - 20:00',
        'working_days' => 'понедельник - суббота',
        'phone' => '+992 918 00 00 00',
        'email' => 'nm@dustipharma.com',
        'x_coordinates' => '38.5779900197525',
        'y_coordinates' => '68.74977528901772'
      ],

      [
        'title' => 'Аптека №3',
        'working_hours' => '08:00 - 20:00',
        'working_days' => 'понедельник - суббота',
        'phone' => '+992 918 00 00 00',
        'email' => 'nm@dustipharma.com',
        'x_coordinates' => '38.57727708929384',
        'y_coordinates' => '68.74359547986681'
      ],

      [
        'title' => 'Аптека №4',
        'working_hours' => '08:00 - 20:00',
        'working_days' => 'понедельник - суббота',
        'phone' => '+992 918 00 00 00',
        'email' => 'nm@dustipharma.com',
        'x_coordinates' => '38.58083328381009',
        'y_coordinates' => '68.74920666053954'
      ],
    ];

    foreach ($items as $item) {
      Drugstore::create($item);
    }
  }
}
