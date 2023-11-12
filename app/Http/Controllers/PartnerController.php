<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
  const IMAGE_PATH = 'img/partners';

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
    $totalItems = Partner::select('id', 'title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Partner::orderBy($orderBy, $orderType)
      ->paginate(25, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.partners.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.partners.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $item = new Partner();
    $fields = ['title', 'body', 'link'];
    fillModelColumns($item, $fields, $request);

    // upload files
    uploadModelsFile($request, $item, 'image', transliterateIntoLatin($item->title), self::IMAGE_PATH, 222, 84);

    $item->save();

    return redirect()->route('partners.dashboard.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request)
  {
    $item = Partner::find($request->id);

    return view('dashboard.partners.edit', compact('item'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $item = Partner::find($request->id);
    $fields = ['title', 'body', 'link'];
    fillModelColumns($item, $fields, $request);
    $item->save();

    // upload files
    uploadModelsFile($request, $item, 'image', transliterateIntoLatin($item->title), self::IMAGE_PATH, 222, 84);
    $item->save();

    return redirect()->route('partners.dashboard.index');
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
      Partner::find($id)->delete();
    }

    return redirect()->route('partners.dashboard.index');
  }
}
