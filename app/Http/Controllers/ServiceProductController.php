<?php

namespace App\Http\Controllers;

use App\Models\ServiceProduct;
use Illuminate\Http\Request;

class ServiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = ServiceProduct::getAll();
        return $invoices->toJson();

        // return response()->json(auth()->user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProduct $serviceProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProduct $serviceProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProduct $serviceProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProduct  $serviceProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProduct $serviceProduct)
    {
        //
    }
}
