<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Tokens;
use App\Models\User;
use App\Enums\Status;
use App\Enums\TransactionType;
use App\Enums\Description;
use Exception;
use DataTables;

class TransactionService
{

  public function buy(Request $request)
  {
    try {
      DB::transaction(function () use ($request) {
        $transaction = new Transaction;
        $transaction->user_id = $request->account_id;
        $transaction->token_id = $request->token_id;
        $transaction->tr_no = $request->trno;
        $transaction->amount = $request->amount;
        $transaction->token = $request->tokens;
        $transaction->uuid = Str::uuid();
        $transaction->user_wallet_id = $this->getUserWallet($request->account_id, $request->token_id)->id;
        $transaction->current_price = $this->getToken($request->token_id)->price;
        $transaction->transaction_type_id = TransactionType::CASH_IN_TOKENS;
        $transaction->approved_at = $request->has('approve') ? now() : null;
        $transaction->description = Description::BUY_CASH_IN_TOKENS;
        $transaction->status_id = $request->has('approve') ? Status::COMPLETED : Status::PENDING;
        $transaction->encoded_by = auth()->user()->id;
        $transaction->save();

        if ($request->hasFile('file')) {
          $ext = $request->file->getClientOriginalExtension();
          $uuid = Str::uuid();
          $path = public_path('/uploads');
          $request->file->move($path, $uuid . '.' . $ext);
          $transaction->file()->create(['image' => $uuid . '.' . $ext]);
        }
      });

      return response()->json(['message' => 'Successfully created.'], 200);
    } catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function edit($id)
  {
    try {
      $transaction = Transaction::findOrFail($id);
      return response()->json($transaction);
    } catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function update(Request $request, $id)
  {
    try {
    } catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function destroy($id)
  {
    try {
    } catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $users = Transaction::all();
    return DataTables::of($users)
      ->addColumn('tr_details', function ($q) {
        return '<a href="' . url('/operations/transactions/' . $q->id) . '" target="_blank">' . $q->tr_no . '</a>';
      })
      ->addColumn('status', function ($q) {
        $color = '';
        if ($q->status->id === Status::CANCEL) {
          $color = 'bg-primary';
        } else if ($q->status->id === Status::PENDING) {
          $color = 'bg-warning';
        } else if ($q->status->id === Status::COMPLETED) {
          $color = 'bg-success';
        } else if ($q->status->id === Status::REJECTED) {
          $color = 'bg-danger';
        }

        return '<span class="badge ' . $color . '">' . $q->status->name . '</span>';
      })
      ->addColumn('name', function ($q) {
        return '
          <div class="form-check">
            <input class="form-check-input select-transaction" type="checkbox" value="' . $q->id . '" id="flexCheckDefault-' . $q->id . '">
            <label class="form-check-label text-info" for="flexCheckDefault-' . $q->id . '">
              ' . $q->user->full_name . '
            </label>
          </div>
        ';
      })
      ->addColumn('options', function ($q) {
        $edit = '';
        $accept = '';
        $reject = '';
        $delete = '';

        if ($q->status->id === Status::COMPLETED || $q->status->id === Status::REJECTED) {
          $delete = '<a href="javascript:void(0);" id="' . $q->id . '" class="icon red transaction-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject" data-bs-original-title="Delete Row">
            <i class="icon-trash"></i>
          </a>';
        }

        if ($q->status->id === Status::PENDING) {
          // $edit = '<a href="javascript:void(0);" id="' . $q->id . '" class="icon blue transaction-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-original-title="Add Row">
          //   <i class="icon-edit-2"></i>
          // </a>';
          $accept = '<a href="javascript:void(0);" id="' . $q->id . '" class="icon green transaction-accept" data-bs-toggle="tooltip" data-bs-placement="top" title="Accept" data-bs-original-title="Add Row">
            <i class="icon-check"></i>
          </a>';
          $reject = '<a href="javascript:void(0);" id="' . $q->id . '" class="icon red transaction-reject" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject" data-bs-original-title="Delete Row">
            <i class="icon-cancel"></i>
          </a>';
        }

        return '<div class="td-actions">' . $edit . '' . $accept . '' . $reject . '' . $delete . '</div>';
      })
      ->rawColumns(['name', 'tr_details', 'status', 'options'])
      ->make(true);
  }

  public function approve($id)
  {
    // $bank = $this->bank;
    //         DB::transaction(function() use ($id, $bank) {
    //             $transaction = Transaction::findOrFail($id);
    //             $transaction->status_id = Status::COMPLETED;
    //             $transaction->approved_at = \Carbon\Carbon::now();
    //             $transaction->save();

    //             $userWallet = $transaction->wallet;
    //             $userWallet->balance = ($userWallet->balance+$transaction->token);
    //             $userWallet->save();

    //             $bankWallet = $bank->wallets()->where('token_id', $transaction->token_id)->first();
    //             $bankWallet->balance = ($bankWallet->balance-$transaction->token);
    //             $bankWallet->save();

    //             $bankToken = $bankWallet->token()->findOrFail($transaction->token_id);
    //             $bankToken->price = $bankToken->price+(Increment::ADD_PRICE*$transaction->token);
    //             $bankToken->save();
    //         });

    //         return response()->json(['message' => 'Successfully approved.'], 200);

    try {
      $transaction = Transaction::findOrFail($id);
      $transaction->status_id = Status::COMPLETED;
      $transaction->approved_at = \Carbon\Carbon::now();
      $transaction->save();

      return response()->json(['message' => 'Successfully approved.'], 200);
    } catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function reject($id)
  {
    try {
      $transaction = Transaction::findOrFail($id);
      $transaction->status_id = Status::REJECTED;
      $transaction->save();
      return response()->json(['message' => 'Successfully rejected.'], 200);
    } catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function gettokens(Request $request)
  {
    try {
      $token = Tokens::findOrFail($request->token_id);
      $result = round($request->amount / $token->price, 2);
      return response()->json($result, 200);
    } catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  private function getUserWallet($id, $token)
  {
    $user = User::findOrFail($id);
    $wallet = $user->wallets()->where('token_id', $token)->first();
    return $wallet;
  }

  private function getToken($token)
  {
    return Tokens::findOrFail($token);
  }
}
