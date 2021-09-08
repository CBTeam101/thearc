<?php

namespace App\Http\Controllers;

use App\Models\GiftToken;
use App\Services\GiftTokenService;
use Illuminate\Http\Request;

class GiftTokenController extends Controller
{

    private $service;

    public function __construct(GiftTokenService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unipro.pages.gift-tokens.index');
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
        return $this->service->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GiftToken  $giftToken
     * @return \Illuminate\Http\Response
     */
    public function show(GiftToken $giftToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GiftToken  $giftToken
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftToken $giftToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiftToken  $giftToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftToken $giftToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiftToken  $giftToken
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function datatable()
    {
        return $this->service->datatable();
    }
}
