<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Data1;
use App\Data2;
use Illuminate\Routing\Redirector;

class DynamicfieldController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Redirector $redirect)

    {
        
        if(\Auth::user()->approve_status != 1){
            $redirect->to('/not_approved')->send();
            
        }
        return view('admin.form');
    }

    public function store(Request $request)
    {  
       
        $validation = Validator::make($request->all(), [
            'name.*.*'  => 'required|max:255',
            'country.*.*'  => 'required',
            'district.*.*'  => 'required',
            'addresss.*.*'  => 'required',
            'select_file.*.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);
           
           if($validation->passes())
           { 
           
            for ($i = 1; $i <= count($request->name[0]); $i++) {
              
                $image1 = $request->file('select_file')[0][$i];
                $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
                $image1->move(public_path('images'), $new_name1);

                
                Data1::create([
                    'name' => $request->name[0][$i-1],
                    'country' => $request->country[0][$i-1],
                    'district' => $request->district[0][$i-1],
                    'address' => $request->address[0][$i-1],
                    'image' => $new_name1
                
                ]);
            
             }

            for ($j = 1; $j <= count($request->name[1]); $j++) {
            
                $image2 = $request->file('select_file')[1][$j];
                $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
                $image2->move(public_path('images'), $new_name2);


                Data2::create([
                    'name' => $request->name[1][$j-1],
                    'country' => $request->country[1][$j-1],
                    'district' => $request->district[1][$j-1],
                    'address' => $request->address[1][$j-1],
                    'image' => $new_name2
                
                ]);
            
                }
           
          
                return response()->json([
                    'success'   => "Done",
                 
                   ]);
          
                
      
              
      
           }
      
           else
           {
            return response()->json([
             'error'   => $validation->errors()->all(),
          
            ]);
           }
    }
}
