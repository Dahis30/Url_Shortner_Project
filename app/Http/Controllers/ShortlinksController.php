<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortlink;
use Illuminate\Support;

class ShortlinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        //

        $shortLinks= Shortlink::paginate(10);

        return view('short_link',["s"=>$shortLinks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                "link"=>'required|url|unique:short_links,link',
                // |unique:short_links:link
            ]
            );
            $data['link']=$request->link;

            $data['code']=$this->generateUniqueCode();
            // rand(100000,900000)
            // Illuminate\Support\Str::random(6)
            Shortlink::create($data);
            return redirect('/')->with('success','URL WAS GENERATED') ;
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Shortlink::where("code", "=", $code)->first());
  
        return $code;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
          
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($c)
    {
      
       
            $row =  Shortlink::where('code',$c)->firstorfail();
            
            $row->delete();
            return redirect('/');
      
                 
    }
}
