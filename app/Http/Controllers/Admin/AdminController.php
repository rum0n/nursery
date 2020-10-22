<?php

namespace App\Http\Controllers\Admin;

use App\Tree;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $trees = Tree::latest()->get();
        return view('admin.dashboard', compact('trees'));

    }

    public function status($id)
    {
        $tree = Tree::findOrFail($id);

        $tree->status = 'Approved';
        $tree->save();

        Toastr::success('Successfully Approved !' ,'Tree');
        return redirect()->back();
    }

    public function delete_tree($id)
    {
        $tree = Tree::find($id);
        $path=public_path().'/images/treePic/'.$tree->picture;

        if (file_exists($path)) {
            unlink($path);
        }
        $tree->delete();

        Toastr::success('Successfully Deleted !' ,'Tree');
        return redirect()->back();
    }


}
