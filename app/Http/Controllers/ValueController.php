<?php

namespace App\Http\Controllers;

use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
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
    $totalItems = Value::select('id', 'title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Value::orderBy($orderBy, $orderType)
      ->paginate(25, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.values.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.values.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $item = new Value();
    $fields = ['title', 'body'];
    fillModelColumns($item, $fields, $request);
    $item->save();

    return redirect()->route('values.dashboard.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request)
  {
    $item = Value::find($request->id);

    return view('dashboard.values.edit', compact('item'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $item = Value::find($request->id);
    $fields = ['title', 'body'];
    fillModelColumns($item, $fields, $request);
    $item->save();

    return redirect()->route('values.dashboard.index');
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
      Value::find($id)->delete();
    }

    return redirect()->route('values.dashboard.index');
  }
}
