<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.portfolio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'description' => 'required|min:20',
        ]);

        $portfolio = $this->portfolio;
        
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->url = $request->url;
        $portfolio->client = $request->client;
        $portfolio->client_url = $request->client_url;
        $portfolio->image = $request->image;

        $portfolio->save();

        $portfolio->category()->sync($request['portfolio_category']);

        $portfolio->tag()->sync($request['portfolio_tag']);

        $portfolio->media()->sync($request['portfolio_media']);

        return redirect()->back();
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
        $portfolio = $this->portfolio->findOrFail($id);

        return view('dashboard.portfolio.edit', compact('portfolio'));
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
        $this->validate($request, [
            'title' => 'required|min:10',
            'description' => 'required|min:20',
        ]);

        $input = $request->all();
        
        $portfolio = $this->portfolio->findOrFail($id);

        $portfolio->update($input);

        $portfolio->category()->sync($request['portfolio_category']);

        $portfolio->tag()->sync($request['portfolio_tag']);

        $portfolio->media()->sync($request['portfolio_media']);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
