<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;


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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      // FirebaseAuth.getInstance().getCurrentUser();
      try { 
        
        $users = app('firebase.firestore')->database()->collection('users')->documents();
        // $users = User::latest()->paginate(5);
        return view('home',compact('users'))->with('i');  
                
      } catch (\Exception $e) {
        return $e;
      }

    }

    // public function customer()
    // {
    //   $userid = Session::get('uid');
    //   return view('customers',compact('userid'));
    // }

    public function store(Request $request)
    {
      
    }
    public function show (Request $request)
    {
      $userRef = app('firebase.firestore')->database()->collection('users')->document($request->view_id)
          ->show([  
          'name'=>$request->name,
          'secondName'=> $request->secondName,
          'thirdName'=> $request->thirdName,
          'lastName'=> $request->lastName,
          'email'=> $request->email,
          'dateBirth'=> $request->dateBirth,
          'phoneNumber'=> $request->phoneNumber,
          'nationalNumber'=> $request->nationalNumber,
          'Address'=> $request->Address,
          ]);
    }
    public function destroy(Request $request)
    {
      //
      app('firebase.firestore')->database()->collection('users')->document($request->delete_id)->delete();
      return back()->with('message','Motorcycles deleted');
    }
}
