<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
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
        'body' => 'Обеспечение население нашей страны качественной фармацевтической продукцией'
      ],

      [
        'body' => 'Развитие фармацевтического рынка и формирование высоких стандартов ведения бизнеса'
      ],

      [
        'body' => 'Способствование созданию среды для развития и реализации потенциала наших сотрудников'
      ],

      [
        'body' => 'Содействие развитию бизнеса наших партнеров и клиентов'
      ]
    ];

    foreach ($items as $item) {
      Mission::create($item);
    }
  }
}
