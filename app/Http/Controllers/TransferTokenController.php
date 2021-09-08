<?php

namespace App\Http\Controllers;

use App\Models\TransferToken;
use App\Services\TransferTokenService;
use Illuminate\Http\Request;

class TransferTokenController extends Controller
{

    private $service;

    public function __construct(TransferTokenService $service)
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
        return view('unipro.pages.transfer-tokens.index');
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
     * @param  \App\Models\TransferToken  $transferToken
     * @return \Illuminate\Http\Response
     */
    public function show(TransferToken $transferToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransferToken  $transferToken
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferToken $transferToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransferToken  $transferToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferToken $transferToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransferToken  $transferToken
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
