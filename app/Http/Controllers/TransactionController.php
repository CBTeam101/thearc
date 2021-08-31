<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Enums\TransactionType;
use App\Enums\Description;
use App\Enums\Role;
use App\Enums\Status;
use App\Enums\Increment;
use App\Models\User;
use Illuminate\Support\Str;
use App\Services\TransactionService;
use DataTables;

class TransactionController extends Controller
{
    private $bank;
    private $service;

    public function __construct(TransactionService $service)
    {
        $this->bank = User::role(Role::BANK)->first();
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unipro.pages.transactions.index');
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function approve($id)
    {
        try {
            $bank = $this->bank;
            DB::transaction(function() use ($id, $bank) {
                $transaction = Transaction::findOrFail($id);
                $transaction->status_id = Status::COMPLETED;
                $transaction->approved_at = \Carbon\Carbon::now();
                $transaction->save();

                $userWallet = $transaction->wallet;
                $userWallet->balance = ($userWallet->balance+$transaction->token);
                $userWallet->save();

                $bankWallet = $bank->wallets()->where('token_id', $transaction->token_id)->first();
                $bankWallet->balance = ($bankWallet->balance-$transaction->token);
                $bankWallet->save();

                $bankToken = $bankWallet->token()->findOrFail($transaction->token_id);
                $bankToken->price = $bankToken->price+(Increment::ADD_PRICE*$transaction->token);
                $bankToken->save();
            });

            return response()->json(['message' => 'Successfully updated.'], 200);
        }
        catch(\Exception $e)
        {
            $bug = $e->getMessage();

            return response()->json(['message' => $bug ]);
        }
    }

    public function datatable()
    {
        return $this->service->datatable();
    }

    public function gettokens(Request $request)
    {
        return $this->service->gettokens($request);
    }

    public function buy(Request $request)
    {
        return $this->service->buy($request);
    }
}
