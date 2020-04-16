<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoronaController extends Controller
{


  /*  public function main()
    {
      $more = 'wash hads!, sanitize!';
      return view('corona', compact('more'));
    }*/

    public function index()
    {

      return view('corona');
    }
/*    public function moore()
    {
      $more = 'wash hands!';
      return view('corona', compact('more'), compact('more'));
    }
*/
}
