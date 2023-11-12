<?php

namespace App\Http\Controllers;

use App\Models\Drugstore;
use App\Models\Gallery;
use Illuminate\Http\Request;

class DrugstoreController extends Controller
{
  const IMAGE_PATH = 'img/drugstores';

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
    $totalItems = Drugstore::select('id', 'title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Drugstore::orderBy($orderBy, $orderType)
      ->paginate(25, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.drugstores.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.drugstores.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $item = new Drugstore();
    $fields = ['title', 'phone', 'email', 'working_days', 'working_hours', 'x_coordinates', 'y_coordinates'];
    fillModelColumns($item, $fields, $request);

    $item->save();

    // upload gallery images
    Gallery::storeDrugstoreImages($request->images, $item->id);

    return redirect()->route('drugstores.dashboard.edit', $item->id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request)
  {
    $item = Drugstore::find($request->id);

    return view('dashboard.drugstores.edit', compact('item'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $item = Drugstore::find($request->id);
    $fields = ['title', 'phone', 'email', 'working_days', 'working_hours', 'x_coordinates', 'y_coordinates'];
    fillModelColumns($item, $fields, $request);
    $item->save();

    // upload gallery images
    if($request->images) {
      Gallery::storeDrugstoreImages($request->images, $item->id);
    }

    return redirect()->route('drugstores.dashboard.index');
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
      Drugstore::find($id)->delete();
    }

    return redirect()->route('drugstores.dashboard.index');
  }
}
