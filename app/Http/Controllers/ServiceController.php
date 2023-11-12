<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  const IMAGE_PATH = 'img/services';

  /**
   * Display a listing of the resource.
   */
  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Service::select('id', 'title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Service::orderBy($orderBy, $orderType)
      ->paginate(25, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.services.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.services.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $item = new Service();
    $fields = ['body'];
    fillModelColumns($item, $fields, $request);
    $item->title = customNl2br($request->title);

    // upload files
    uploadModelsFile($request, $item, 'image', transliterateIntoLatin($item->title), self::IMAGE_PATH, 44);

    $item->save();

    return redirect()->route('services.dashboard.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request)
  {
    $item = Service::find($request->id);

    return view('dashboard.services.edit', compact('item'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $item = Service::find($request->id);
    $fields = ['body'];
    fillModelColumns($item, $fields, $request);
    $item->title = customNl2br($request->title);
    $item->save();

    // upload files
    uploadModelsFile($request, $item, 'image', transliterateIntoLatin($item->title), self::IMAGE_PATH, 44);
    $item->save();

    return redirect()->route('services.dashboard.index');
  }

  /**
   * Request for deleting items by id may come in integer type (destroy single item form)
   * or in array type (destroy multiple items form)
   * That`s why we need to get id in array type and delete them by loop
   *
   * Checkout Model Boot methods deleting function
   * Models relations also deleted on deleting function of Models Boot method
   */
  public function destroy(Request $request)
  {
    $ids = (array) $request->id;

    foreach ($ids as $id) {
      Service::find($id)->delete();
    }

    return redirect()->route('services.dashboard.index');
  }
}
