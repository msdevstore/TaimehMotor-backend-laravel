<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;

use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $motors = app('firebase.firestore')->database()->collection('motors')->documents();
            return view('motorcycles', compact('motors'))->with('i');
        } catch (\Exception $e) {
            return $e;
        }
        
    }

    
    public function store(Request $request)
    {     
        if ($request -> hasFile('featuredImage')){
        $input = $request->all();
        $image = $request->file('featuredImage'); //image file from frontend
        
        $motor   = app('firebase.firestore')->database()->collection('Images')->newDocument();
        $firebase_storage_path = 'Images/';
        $name     = $motor->id();
        $localfolder = public_path('firebase-temp-uploads') .'/';
        $extension = $image->getClientOriginalExtension();
        $file      = $name. '.' . $extension;
          
        if ($image->move($localfolder, $file)) {
          $uploadedfile = fopen($localfolder.$file, 'r');
          app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
          //will remove from local laravel folder
             
          unlink($localfolder . $file);

          $expiresAt = new \DateTime('tomorrow');          
          $imageReference = app('firebase.storage')->getBucket()->object($firebase_storage_path . $file);
          if ($imageReference->exists()) {
            $imageURL = $imageReference->signedUrl($expiresAt);
             } else {
            $imageURL = null;
          } 
          // return $imageURL;
          // print_r($imageURL);die;
        }

        $motorRef = app('firebase.firestore')->database()->collection('motors')->newDocument();
        $motorRef->set([
          'featuredImage'=>$imageURL,
          'frameNumber'=>$request->frameNumber,
          'productionYear'=> $request->productionYear,
          'brand'=> $request->brand,
          'type'=> $request->type,
          'EngineNumber'=> $request->EngineNumber,
          'LastUpdate'=> $request->LastUpdate,
          'lastmeterreading'=> $request->lastmeterreading,
          'currentowner'=> $request->currentowner,
          'specialRequirement'=> $request->specialRequirement,
          'mainColor'=> $request->mainColor,
          'secondaryColor'=> $request->secondaryColor,
          'end_licence'=> $request->end_licence,
          'plate_number'=> $request->plate_number,
          'location'=> $request->location,
          'numPassengers'=> $request->numPassengers,
          'loadCapacitor'=> $request->loadCapacitor,
          'amount'=> $request->amount,
          'price'=> $request->price,
          'rating'=> $request->rating,
          
        ]);
        }
        // dd($request->image);
        Session::flash('message', 'Motorcycle Added');
        return back()->withInput();
        
    }
    public function update_motor(Request $request)
    {
        $motorRef = app('firebase.firestore')->database()->collection('motors')->document($request->update_id)
            ->update([
                
                ['path' => 'frameNumber', 'value' => $request->frameNumber],
                ['path' => 'productionYear', 'value' => $request->productionYear],
                ['path' => 'brand', 'value' => $request->brand],
                ['path' => 'type', 'value' => $request->type],
                ['path' => 'EngineNumber', 'value' => $request->EngineNumber],
                ['path' => 'LastUpdate', 'value' => $request->LastUpdate],
                ['path' => 'lastmeterreading', 'value' => $request->lastmeterreading],
                ['path' => 'currentowner', 'value' => $request->currentowner],
                ['path' => 'specialRequirement', 'value' => $request->specialRequirement],
                ['path' => 'mainColor', 'value' => $request->mainColor],
                ['path' => 'secondaryColor', 'value' => $request->secondaryColor],
                ['path' => 'end_licence', 'value' => $request->end_licence],
                ['path' => 'plate_number', 'value' => $request->plate_number],
                ['path' => 'location', 'value' => $request->location],
                ['path' => 'numPassengers', 'value' => $request->numPassengers],
                ['path' => 'loadCapacitor', 'value' => $request->loadCapacitor],
                ['path' => 'amount', 'value' => $request->amount],
                ['path' => 'price', 'value' => $request->price],
                ['path' => 'rating', 'value' => $request->rating],
            ]);
        Session::flash('message', 'Information Updated');
        return back()->withInput();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_motor(Request $request)
    {
        //
        $motorRef = app('firebase.firestore')->database()->collection('motors')->document($request->view_id)
          ->show([
            'frameNumber' => $request->frameNumber,
            'productionYear' => $request->productionYear,
            'brand' => $request->brand,
            'type' => $request->type,
            'EngineNumber' => $request->EngineNumber,
            'LastUpdate' => $request->LastUpdate,
            'lastmeterreading' => $request->lastmeterreading,
            'currentowner' => $request->currentowner,
            'specialRequirement' => $request->specialRequirement,
            'mainColor' => $request->mainColor,
            'secondaryColor' => $request->secondaryColor,
            'end_licence' => $request->end_licence,
            'plate_number' => $request->plate_number,
            'location' => $request->location,
            'numPassengers' => $request->numPassengers,
            'loadCapacitor' => $request->loadCapacitor,
            'amount' => $request->amount,
            'price' => $request->price,
            'rating' => $request->raiting,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // dd($request->delete_id);
        app('firebase.firestore')->database()->collection('motors')->document($request->delete_id)->delete();
        // Session::flash('message', 'Motorcycles deleted');
        return back()->with('message','Motorcycles deleted');
    //   return redirect()->route('motorcycles');
    }
}
