<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $pages = Page::all();
          
          return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }
    public function fileUpload(Request $request) {
    $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $this->save();

            //return back()->with('success','Image Upload successfully');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Page $page)
    {
         //validacija
        request()->validate([
            'title' => 'required|string|min:3|max:191',
            'description' => 'required|string|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'layout' => 'required|string',
            'contact_form' => 'integer',
             'header' => 'integer',
             'aside' => 'integer',
             'footer' => 'integer',
             'active' => 'integer',
        ]);
        
         $page->title = request()->title;
         $page->description = request()->description;
//          if (request()->hasFile('image')) {
//            $image = request()->file('image');
//            $name = time().'.'.$image->getClientOriginalExtension();
//            $destinationPath = public_path('/images');
//            $image->move($destinationPath, $name);
//            //$this->save();
//
//            //return back()->with('success','Image Upload successfully');
//        }
         $page->image = request()->image;
         $name = time().'.'.$page->image->getClientOriginalExtension();
         $destinationPath = public_path('/images');
         $page->image->move($destinationPath, $name);
         $page->image = $name;
        // $page->image->save();
         $page->content = request()->content;
         $page->contact_form = request()->contact_form;
         $page->header = request()->header;
         $page->aside = request()->aside;
         $page->footer = request()->footer;
         $page->active = request()->active;
         
         $page->save();
        
        
        session()->flash('message-type', 'success');
        session()->flash('message-text', 'Successfully created page!!!');
        
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
