<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Catagory;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus=Menu::all();
        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Catagory::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');
       $menu= Menu::create([
            'name' => $request->name,
            'price'=>$request->price,
            'description' => $request->description,
            'image' => $image
        ]);
        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return to_route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories=Catagory::all();
        return view('admin.menus.edit',compact('menu','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Menu $menu)
    {
        

        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'price'=>'required'
            ]
        );
        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/categories');
        }
        $menu->update([
            'name' => $request->name,
            'price'=>$request->price,
            'description' => $request->description,
            'image' => $image
        ]);


        return to_route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {


        Storage::delete($menu->image);

        $menu->delete();
        return to_route('admin.menus.index');
        
    }
}
