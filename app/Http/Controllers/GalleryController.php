<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Gallery  $gallery
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    $gallery = Gallery::find($request->id);

    // return warning if its single image for the givven drugstroe
    if(Gallery::where('drugstore_id', $gallery->drugstore_id)->count() < 2) {
      return redirect()->back()->withErrors('Галерея как минимум должна иметь 1 изображение!');
    }

    Gallery::find($request->id)->delete();

    return redirect()->back();
  }
}
