<?php

namespace App\Http\Controllers;

use App\Tree;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $trees = Tree::where('status','Approved')->latest()->paginate(6);
//        dd($trees);
        return view('home', compact('trees'));
    }

    public function view_tree($id)
    {
        $tree = Tree::find($id);
//        dd($trees);
        return view('view_tree', compact('tree'));
    }

    //============= Search House =================
    public function search_tree(Request $request)
    {
//        dd($request->all());
        $trees = Tree::where('name','LIKE','%'.$request->tree_name."%")
            ->orwhere('price','LIKE','%'.$request->tree_name."%")
            ->orwhere('details','LIKE','%'.$request->tree_name."%")
            ->orwhere('category_id','LIKE','%'.$request->tree_name."%")
            ->where('status','Approved')
            ->orderBy('id','DESC')
            ->paginate(3);


        $rows = $trees->count();

        if($rows == 0){
            Toastr::warning('No Match result found for your search '.$request->tree_name.' !' ,'Sorry !');
            return redirect()->back();
        }
        $message = $request->tree_name;
//        $results = 'About '.$rows.'results found';

        return view('search', compact('trees','rows','message'));

    }

}
