<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// use function App\Support\transliterateIntoLatin;

class AdvantageSeeder extends Seeder
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
        'title' => 'Кратчайшие <br>сроки',
        'body' => 'Подходящее время доставки всего ассортимента наших препаратов до адресата'
      ],

      [
        'title' => 'Надежность и <br>безопасность',
        'body' => 'Безопасная доставка ваших заказов на технически оснащенном транспорте'
      ],

      [
        'title' => 'Точности <br>исполнения',
        'body' => 'Доставка оформленных заказов в точно установленное время без задержек'
      ],

      [
        'title' => 'Особый подход <br>к клиенту',
        'body' => 'Разработка и внедрение особых условий обслуживания клиентов'
      ],

      [
        'title' => 'Сертифицированная <br>продукция',
        'body' => 'Вся реализуемая продукция сертифицирована и является декларированной'
      ],

      [
        'title' => 'Оптимальные <br>маршруты',
        'body' => 'Подготовка индивидуальных маршрутов, удобных для доставки именно Вашего заказа'
      ],

      [
        'title' => 'Необходимая <br>техника',
        'body' => 'Компания обладаем всем необходимым для создания благоприятных условий транспортировки'
      ],

      [
        'title' => 'Мировой <br>опыт',
        'body' => 'Постоянная работа с местными и зарубежными компаниями позволяет перенимать передовой опыт коллег'
      ],
    ];

    foreach($items as $item) {
      Advantage::create($item);
    }

    Advantage::get()->each(function ($item) {
      $item->image = transliterateIntoLatin($item->title) . '.png';
      $item->save();
    });
  }
}
