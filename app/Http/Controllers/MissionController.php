<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
  const IMAGE_PATH = 'img/advantages';

  /**
   * Display a listing of the resource.
   */
  public function dashboardIndex(Request $request)
  {
    // for search and counter
    $totalItems = Mission::all();

    // display as list in table
    $items = Mission::all();

    return view('dashboard.missions.index', compact('totalItems', 'items'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.missions.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $item = new Mission();
    $fields = ['body'];
    fillModelColumns($item, $fields, $request);
    $item->save();

    return redirect()->route('missions.dashboard.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request)
  {
    $item = Mission::find($request->id);

    return view('dashboard.missions.edit', compact('item'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $item = Mission::find($request->id);
    $fields = ['body'];
    fillModelColumns($item, $fields, $request);
    $item->save();

    return redirect()->route('missions.dashboard.index');
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
      Mission::find($id)->delete();
    }

    return redirect()->route('missions.dashboard.index');
  }
}
