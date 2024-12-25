<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TestPageController extends Controller
{
  public function index()
  {
    return Inertia::render('Test/Index');
  }
}
