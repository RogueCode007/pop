<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Image;
use App\Models\Photo;
use App\Models\Item;

class PhotosController extends Controller
{
    public function create($id){
        $item = Item::findOrFail($id);
        return view('items.addPhoto', ['item'=>$item]);
    }
    public function store($id, Request $request){
        $request->validate([
            'photo'=> 'required',
            'photo.*'=> 'bail|image|max:4096'
        ]);
        $item = Item::findOrFail($id);
        if($request->hasFile('photo')){
            foreach($request->photo as $image){
                $name = $image->getClientOriginalName();
                $image->move(storage_path().'/app/public/images', $name);
                $photo = new Photo(['name' => $name]);
                $item->photos()->save($photo);
            }
        }
        return redirect()->route('items.show', [$id])->with('success', 'Item added to store!');
    }

   
}
