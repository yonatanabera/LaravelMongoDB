<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item; 
use Session; 
use RealRashid\SweetAlert\Facades\Alert;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items= Item::orderBy("created_at", "desc")->get();
        return view("item.item", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'type'=>'required',
            'qty'=>'required|min:0|int'
        ]);
        // return Auth::user()->_id;
        $items=[
            'name'=>$request->name,
            'type'=>$request->type,
            'qty'=>$request->qty,
            'user_id'=>Auth::user()->_id,
        ];
        Item::create($items);
        
        // You can also use this way
        /*
            $item=new Item();
            $item->name=$request->name;
            $item->type=$request->type;
            $item->qty=$request->qty;

            $item->save();
        */
        Alert::toast()->success("Item inserted successfully");
       
        return redirect(route('item.index'));
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
        $item=Item::find($id);
        // return $items;
        return view('item.edit', compact('item')); 
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
        Item::find($id)->update($request->all());
        Alert::toast()->success("Item Updated successfully");
        // Alert::success("Success", "Item updated");
        return redirect(route('item.index')); 
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
        Item::find($id)->delete();
        
        Alert::toast()->success("Item deleted successfully");
        return redirect(route('item.index'));
        
    }

    public function getUser(){
        return Item::first()->user;
    }

    public function getItem(){
        return Auth::user()->item;
    }
}
