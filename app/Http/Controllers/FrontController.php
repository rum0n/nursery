<?php

namespace App\Http\Controllers;

use App\Category;
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

        return view('view_tree', compact('tree'));
    }

    //============= Search House =================
    public function search_tree(Request $request)
    {
//        dd($request->all());
        if($request->tree_name == '') {
            Toastr::warning('Please type something','Empty field!');
            return redirect()->back();
        }

        if($request->filter == ''){

            $trees = Tree::where('name','LIKE','%'.$request->tree_name."%")
                ->orwhere('price','LIKE','%'.$request->tree_name."%")
                ->orwhere('details','LIKE','%'.$request->tree_name."%")
                ->orwhere('category_id','LIKE','%'.$request->tree_name."%")
                ->where('status','Approved')
                ->orderBy('id','DESC')
                ->paginate(6);
        }

        if($request->filter == 'asc'){

            $trees = Tree::where('name','LIKE','%'.$request->tree_name."%")
                ->orwhere('price','LIKE','%'.$request->tree_name."%")
                ->orwhere('details','LIKE','%'.$request->tree_name."%")
                ->orwhere('category_id','LIKE','%'.$request->tree_name."%")
                ->where('status','Approved')
                ->orderBy('price','asc')
                ->paginate(6);

        }
        if($request->filter == 'desc'){

            $trees = Tree::where('name','LIKE','%'.$request->tree_name."%")
                ->orwhere('price','LIKE','%'.$request->tree_name."%")
                ->orwhere('details','LIKE','%'.$request->tree_name."%")
                ->orwhere('category_id','LIKE','%'.$request->tree_name."%")
                ->where('status','Approved')
                ->orderBy('price','DESC')
                ->paginate(6);
        }


        $rows = $trees->count();

        if($rows == 0){
            Toastr::warning('No Match result found for your search '.$request->tree_name.' !' ,'Sorry !');
            return redirect()->back();
        }
        $message = $request->tree_name;
        $filter = $request->filter;

        return view('search', compact('trees','rows','message','filter'));

    }

}
