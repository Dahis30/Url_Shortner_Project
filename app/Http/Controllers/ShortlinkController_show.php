<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortlink;

class ShortlinkController_show extends Controller
{
    //
   
    public function show($code){
       
      $row =  Shortlink::where('code',$code)->firstorfail();
      $row->visits_count += 1 ;
      $row->save();
      return redirect($row->link);

           }
           public function destroy($code){
       
            $row =  Shortlink::where('code',$code);
            
            $row->delete();
            return view('short_link');
      
                 }
}
