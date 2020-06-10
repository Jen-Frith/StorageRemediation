<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Carousel;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carousels=Carousel::all();
        return view('carousel/index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'imgCarousel' => 'required|image|min:1000',
            ]);
            
            if ($validator->fails()) {
                $messages= $validator->messages();
                return Redirect::back()->withErrors($messages)
                ->withInput($request->all());}

                $carousel=new Carousel();

                $carousel->imgCarousel=request('imgCarousel')->store('img');
                
           $carousel->save();
           return redirect()->route('carousel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $carousel=Carousel::find($id);


        return view('carousel.edit', compact('carousel'));
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
        $validator = Validator::make($request->all(), [
            'imgCarousel' => 'required|image|min:1000',
            ]);
            
            if ($validator->fails()) {
                $messages= $validator->messages();
                return Redirect::back()->withErrors($messages)
                ->withInput($request->all());}


                $carousel=Carousel::find($id);
                if($carousel!=null){
                    Storage::delete($carousel->imgCarousel);
                }

                $carousel->imgCarousel=request('imgCarousel')->store('img');
                
                $carousel->save();
                return redirect()->route('carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel=Carousel::find($id);

        $carousel->delete();
        return redirect()->route('carousel.index');

    }
}
