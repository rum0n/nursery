<?php

namespace App\Http\Controllers\Nursery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function index()
    {

        return redirect()->route('owner.tree.index');
    }
}
