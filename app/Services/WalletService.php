<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Exception;
use DataTables;

class WalletService {

  public function store(Request $request)
  {
    try {
      Wallet::create($request->toArray());
      return response()->json(['message' => 'Wallet created successfully.'], 201);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function edit($id)
  {
    try {
      $wallet = Wallet::findOrFail($id);
      $wallet['holder'] = $wallet->user->full_name;
      $wallet['token_type'] = $wallet->token->name;
      return response()->json($wallet, 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $wallet = Wallet::findOrFail($id);
      $wallet->update($request->toArray());
      return response()->json(['message' => 'Wallet successfully updated.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function destroy($id)
  {
    try {
      $wallet = Wallet::findOrFail($id);
      $wallet->delete();
      return response()->json(['message' => 'Wallet successfully deleted.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $statuses = Wallet::orderBy('user_id', 'DESC')->get();
    return DataTables::of($statuses)
      ->addColumn('holder', function($q) {
        return $q->user->full_name;
      })
      ->addColumn('token', function($q) {
        return $q->token->name;
      })
      ->addColumn('options', function($q) {
        return '<div class="td-actions">
        <a href="javascript:void(0);" id="'.$q->id.'" class="icon blue wallet-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Row">
          <i class="icon-edit-2"></i>
        </a>
      </div>';
      })
      ->rawColumns(['options'])
      ->make(true);
  }

}