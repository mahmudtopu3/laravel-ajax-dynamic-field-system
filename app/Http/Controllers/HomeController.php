<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function dashboard(Redirector $redirect)
    {
        if(\Auth::user()->approve_status != 1){
            $redirect->to('/not_approved')->send();
            
        }

        $approved = User::select("approve_status")
               ->where("approve_status",1)
               ->get()
               ->count("approve_status");
        $pending = User::select("approve_status")
                ->where("approve_status",0)
                ->get()
                ->count("approve_status");
               
        return view('admin.index',compact('approved','pending'));
    }

  
   
    public function user(Redirector $redirect)
    {
        if(\Auth::user()->approve_status != 1){
            $redirect->to('/not_approved')->send();
            
        }
        if(\Auth::user()->type != "admin"){
            $redirect->to('/dashboard')->send();
            
        }
        $data = User::get();
        
        return view('admin.users',compact('data'));
    }


    public function view($id,Redirector $redirect)
    {
        if(\Auth::user()->approve_status != 1){
            $redirect->to('/not_approved')->send();
            
        }
        if(\Auth::user()->type != "admin"){
            $redirect->to('/dashboard')->send();
            
        }
        $data = User::find($id);
        
        return view('admin.user_edit',compact('data'));
    }



    
    public function create(Request $request,Redirector $redirect)
    {
              

        $this->validate($request, [
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:8',
            'type'=> 'required',
            'approve_status'=> 'required'
        ]);

          
        


        $user = new User;
       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->approve_status = $request->approve_status;
        
        
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()

        ->with('success','User\'s Info Created Successfully');
    }
           


    public function update(Request $request,Redirector $redirect)
    {
        
        if(\Auth::user()->approve_status != 1){
            $redirect->to('/not_approved')->send();
            
        }
        if(\Auth::user()->type != "admin"){
            $redirect->to('/dashboard')->send();
            
        }

      


    

        $this->validate($request, [
               
            'name'=> 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'type'=> 'required',
            'approve_status'=> 'required'
        ]);

          
        


        $data = User::find($request->id);
        $data->name           =  $request->name;      
        $data->email          =  $request->email;    
        $data->type           =  $request->type;
        $data->approve_status =  $request->approve_status;

        $data->save();

        return redirect()->back()

        ->with('success','User\'s Info Updated Successfully');


      
    }



       
    public function delete(Request $request,Redirector $redirect)
    {
        $data = User::find($request->id);
        if(\Auth::user()->approve_status != 1){
            $redirect->to('/not_approved')->send();
            
        }
        if(\Auth::user()->type != "admin"){
            $redirect->to('/dashboard')->send();
            
        }        $data->delete();
        
        return redirect()->back()
                        ->with('success','User deleted successfully');
        // return view('admin.users',compact('data'));
    }


    public function not_approved(Redirector $redirect)
    {
        if(\Auth::user()->approve_status != 0){
            $redirect->to('/dashboard')->send();
            
        }
        return view('admin.not_approved');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
}
