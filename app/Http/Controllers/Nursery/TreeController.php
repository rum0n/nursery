<?php

namespace App\Http\Controllers\Nursery;

use App\Category;
use App\Tree;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $trees = Tree::where('user_id',$id)->latest()->get();
        return view('owner.tree.index', compact('trees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('owner.tree.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'qty'=>'required|numeric',
            'details'=>'required',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;

        $tree = new Tree();
        $tree->name = $request->name;
        $tree->category_id = $request->category_id;
        $tree->user_id = $user_id;
        $tree->price = $request->price;
        $tree->qty = $request->qty;
        $tree->details = $request->details;

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');

            $pic = $image->getClientOriginalExtension();
            $input = time().'.'.$pic;

            $destinationPath = public_path('/images/treePic');

//            $img = Image::make($image->getRealPath());
//            $img->resize(100, 100, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save($destinationPath.'/'.$input);

            $image->move($destinationPath, $input);

            $tree->picture =$input;
        }

        $tree->save();

        Toastr::success('Successfully Added !' ,'Tree');
        return redirect()->route('owner.tree.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function edit(Tree $tree)
    {
        $categories = Category::all();

        return view('owner.tree.edit', compact('categories','tree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tree $tree)
    {
//        dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'qty'=>'required|numeric',
        ]);


        $tree->name = $request->name;
        $tree->category_id = $request->category_id;
        $tree->price = $request->price;
        $tree->qty = $request->qty;
        $tree->details = $request->details;
        $img = $tree->picture;

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');

            $path = public_path().'/donation/thumbnail/'.$img;

            if (file_exists($path)) {
                unlink($path);

            }

            $pic = $image->getClientOriginalExtension();
            $input = time().'.'.$pic;

            $destinationPath = public_path('/images/treePic');

//            $img = Image::make($image->getRealPath());
//            $img->resize(100, 100, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save($destinationPath.'/'.$input);

            $image->move($destinationPath, $input);

            $tree->picture =$input;
        }

        $tree->save();

        Toastr::success('Successfully Updated !' ,'Tree');
        return redirect()->route('owner.tree.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tree $tree)
    {
        $path=public_path().'/images/treePic/'.$tree->picture;

        if (file_exists($path)) {
            unlink($path);
        }
        $tree->delete();

        Toastr::success('Successfully Deleted !' ,'Tree');
        return redirect()->route('owner.tree.index');
    }
}
