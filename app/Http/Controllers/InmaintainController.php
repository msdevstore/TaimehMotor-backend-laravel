<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InmaintainController extends Controller
{
    //
    public function maintain()
    {
        //
        try { 
            $maintainassigns = app('firebase.firestore')->database()->collection('requests')->documents();
            return view('inmaintain',compact('maintainassigns'))->with('i');
          } catch (\Exception $e) {
            return $e;
          }
    }
    public function update_status(Request $request)
    {
      // dd($request->update_status);
      
      $statusRef=app('firebase.firestore')->database()->collection('requests')->document($request->update_status)
      ->update([
        // $status=>'Purchased Assigned',
        ['path' => 'status', 'value' => $request->status],  
      ]);
        return back()->with('message','Confirmed');
      }
}
