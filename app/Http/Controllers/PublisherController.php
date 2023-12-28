<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PublisherController extends Controller
{
    public function index(){

        $publishers = Publisher::where('type','=',1)->get();
        return view('admin.publisher',compact('publishers'));
    }
    public function add(){

        return view('admin.publisher_add');
    }
    public function delete($id){

        Publisher::findOrFail($id)->delete();
        return redirect()->route('publisher_view');
    }
    public function edit($id){

        $publisher = Publisher::findOrFail($id);
        return view('admin.publisher_edit',compact('publisher'));

    }
    public function update(Request $request){

        $request->validate([
            'name'=>['required','string','min:3','max:25'],
            'email'=>['required','email','max:50','min:10'],
            'password'=>['required','string','min:8',]
        ]);
        $publisher = Publisher::findOrFail($request->id);
        if($publisher->email = $request->email){
            if($publisher->password == $request->password){

                $publisher->name = $request->name;
                $publisher->save();
            }
            else{
                $publisher->name = $request->name;
                $publisher->password =$request->password;
                $publisher->save();
            }
        }
        else
        {
            if($publisher->password == $request->password){

                $publisher->name = $request->name;
                $publisher->email = $request->email;
                $publisher->save();
            }
            else{
                $publisher->name = $request->name;
                $publisher->email = $request->email;
                $publisher->password = $request->password;
                $publisher->save();
            }
        }
        return redirect()->back();

    }
    public function create(Request $request){

        $request->validate([
            'name'=>['required','string','min:3','max:25'],
            'email'=>['required','email','unique:publishers','max:50','min:10'],
            'password'=>['required','string','min:8','max:25']
        ]);
        Publisher::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>$request->password,
            'type'=>1 ,
        ]);
        return redirect()->route('publisher_view');
    }

}
