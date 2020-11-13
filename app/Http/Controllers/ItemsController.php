<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Image;
use App\Models\Item;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;


class ItemsController extends Controller
{
    public function index(){
        $items = Item::latest()->paginate(9);
        return view('items.index', compact('items'))
                        ->with('i', (request()->input('page', 1)- 1) 
                        * 9);
    }
    public function show($id){
        $item = Item::findOrFail($id);
        $images = $item->photos;
        return view('items.show', ['item'=> $item, 'images'=> $images]);
    }
    public function show_all_dresses(){
        $items  = Item::where('category', "dress")
                    ->latest()
                    ->paginate(9);
        return view('items.index', ["items"=> $items]);
    }
    public function show_all_footwear(){
        $items  = Item::where('category', 'footwear')
                    ->latest()
                    ->paginate(9);
        return view('items.index', compact('items'))
                                ->with('i', (request()->input('page', 1)- 1) 
                                * 9);
    }
    public function show_all_bags(){
        $items  = Item::where('category', 'bag')
                    ->latest()
                    ->paginate(9);
        return view('items.index', compact('items'))
        ->with('i', (request()->input('page', 1)- 1) 
        * 9);
    }
    public function create(){
        return view('items.create');
    }
    public function store(Request $request){
        $request->flash();
        try{
            $request->validate([
                'name'=> 'bail|required|string|max:50',
                'price'=> 'bail|required|numeric',
                'description'=> 'bail|required|string',
                'coverImage'=> 'bail|required|image|max:1024',
                'category'=> 'bail|required|string',
                'photo.*' => 'bail|image|max:1024',
            ]);
        }catch(Throwable $e){
            return redirect()->routes('items.create')->withInput();
        }

        $cover = $request->coverImage;
        $coverName  = $cover->getClientORiginalName();
        $filepath = '/coverImages'.$coverName;
        Storage::disk('s3')->put($filepath, $cover);
        // $cover->move(storage_path().'/app/public/coverImages', $coverName);

        $form_data = array(
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category'=> $request->category,
            'image_name'=> $coverName,
        );
        $item = Item::create($form_data);

        if($request->hasFile('photo')){
            foreach($request->photo as $image){
                $name = $image->getClientOriginalName();
                $image->move(storage_path().'/app/public/images', $name);
                $photo = new Photo(['name' => $name]);
                $item->photos()->save($photo);
            }
        }

        return redirect('items')->with('success', 'Item added to store!');
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('items')->with('success', 'Item deleted');
    }

    public function edit($id){
        $item = Item::findOrFail($id);
        return view('items.edit', ['item'=>$item]);
    }

    public function update($id, Request $request){
        $item = Item::findOrFail($id);
        $request->flash();
        
        try{
            $request->validate([
            'name'=> 'bail|nullable|string|max:50',
            'price'=> 'bail|nullable|numeric',
            'description'=> 'bail|nullable|string',
            'category'=> 'string|nullable',
            'coverImage' => 'bail|nullable|image|max:1024'
            ]);
        }catch(Throwable $e){
            return redirect('items/edit/{{id}}')->withInput();
        }
        if($request->coverImage){
            $cover = $request->coverImage;
            $coverName  = $cover->getClientORiginalName();
            $cover->move(storage_path().'/app/public/coverImages', $coverName);
            $form_data = array(
                'name' => $request->name ?? $item->name,
                'price' => $request->price ?? $item->price,
                'description' => $request->description ?? $item->description,
                'image_name'=> $coverName 
            );
            $item->update($form_data);
        }else{
            $form_data = array(
                'name' => $request->name ?? $item->name,
                'price' => $request->price ?? $item->price,
                'description' => $request->description ?? $item->description,
            );
            $item->update($form_data);
        }
        
        
        return redirect('items')->with('success', 'Item Updated');
    }
    
}
