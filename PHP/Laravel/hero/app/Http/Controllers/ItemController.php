<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->saveItem($request, null);
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
        $items = Item::find($id);
        return view('admin.items.edit', ['items'=> $items]);
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
        return $this->saveItem($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::find($id);

        $filePath = public_path() . '/images/items/' . $items->img_path;

        if(file_exists($filePath)){
            unlink($filePath);
        }

        $items->delete();
        return redirect()->route('admin.items');
    }

    public function saveItem(Request $request, $id){
        if($id){
            $item = Item::find($id);
        } else{
            $item = new Item();
        }

        $item->name = $request->input('name');
        $item->hp = $request->input('hp');
        $item->atq = $request->input('atq');
        $item->def = $request->input('def');
        $item->luck = $request->input('luck');
        $item->cost = $request->input('cost'); 

        if($request->hasFile('img_path')){
            $file = $request->file('img_path');
            $name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path() . '/images/items/', $name);

            $item->img_path = $name;
        }

        $item->save();
        return redirect()->route('admin.items');
    }
}
