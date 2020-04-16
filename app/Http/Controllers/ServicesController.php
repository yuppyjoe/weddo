<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
      {
        return view('services');
      }
    public function photo()
      {
        return view('services.photos');
      }
    public function plan()
      {
        return view('services.plan');
      }
    public function venue()
      {
        return view('services.venue');
      }
    public function catering()
      {
        return view('services.catering');
      }
    public function cars()
      {
        return view('services.cars');
      }
}
