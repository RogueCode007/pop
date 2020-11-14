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
            'photo.*'=> 'bail|image|max:1024'
        ]);
        $item = Item::findOrFail($id);
        if($request->hasFile('photo')){
            foreach($request->photo as $image){
                $name = $image->getClientOriginalName();
                $filepath = '/images'.$name;
                Storage::disk('s3')->put($filepath, file_get_contents($image));
                $photo = new Photo(['name' => $name]);
                $item->photos()->save($photo);
            }
        }
        return redirect()->route('items.show', [$id])->with('success', 'New photos added!');
    }

   
}
