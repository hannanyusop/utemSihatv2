<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class FoodTypeController extends Controller{

    public function index(Request $request){

        if($request->has('name')){
            $types = Type::where('name', 'LIKE', "%$request->name%")
                ->paginate(20);

        }else{
            $types = Type::paginate(20);
        }
        return view('backend.type.index', compact('types'));
    }

    public function add(){

        return view('backend.type.add');
    }

    public function insert(Request $request){

        $type = new Type();

        $type->name = $request->name;
        $type->description = $request->description;

        if($type->save()){
            return redirect()->route('admin.auth.type.index')->withSuccessMessage('Type inserted successfully!');
        }else{
            return redirect()->route('admin.auth.type.index')->withErrorMessage('Failed to insert type!');
        }

    }

    public function edit($id){

        $type = Type::findOrFail($id);

        return view('backend.type.edit', compact('type'));
    }

    public function update(Request $request, $id){

        $type = Type::findOrFail($id);

        $type->name = $request->name;
        $type->description = $request->description;

        if($type->save()){
            return redirect()->route('admin.auth.type.index')->withSuccessMessage('Type updated successfully!');
        }else{
            return redirect()->route('admin.auth.type.index')->withErrorMessage('Failed to update type!');
        }

    }



}
