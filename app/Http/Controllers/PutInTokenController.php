<?php

namespace App\Http\Controllers;

use App\Models\PutInToken;
use Illuminate\Http\Request;
use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PutInTokenController extends Controller
{
    private $bank;

    public function __construct()
    {
        $this->bank = User::role(Role::BANK)->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $tokenWallet = auth()->user()->wallets()->where('token_id', $request->token_id)->first();
            $data = [
                'ref' => $request->ref,
                'token_id' => $request->token_id,
                'wallet_id'=> $tokenWallet->id,
                'user_id' => auth()->user()->id,
                'tokens' => $request->tokens,
                'current_price' => $tokenWallet->token->price,
                'shares' => $tokenWallet->token->share
            ];

            if($tokenWallet->balance < $request->tokens) {
                return response()->json(['message' => 'Something went wrong.'], 500);
            }

            DB::transaction(function() use ($data, $tokenWallet, $request) {
                // Update balance
                $tokenWallet->balance = ($tokenWallet->balance-$request->tokens);
                $tokenWallet->save();

                PutInToken::create($data);
            });

            return response()->json(['message' => 'Put in token succcessful.']);
        }
        catch (\Exception $e)
        {
            $bug = $e->getMessage();

            return response()->json(['message' => $bug ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PutInToken  $putInToken
     * @return \Illuminate\Http\Response
     */
    public function show(PutInToken $putInToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PutInToken  $putInToken
     * @return \Illuminate\Http\Response
     */
    public function edit(PutInToken $putInToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PutInToken  $putInToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PutInToken $putInToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PutInToken  $putInToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(PutInToken $putInToken)
    {
        //
    }
}
