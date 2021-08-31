<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tokens;
use App\Enums\Role;
use Exception;
use DataTables;

class Select2Service
{

  public function store(Request $request)
  {
    try {} 
    catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function edit($id)
  {
    try {}
    catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function update(Request $request, $id)
  {
    try {} 
    catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function destroy($id)
  {
    try {} 
    catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function useraccounts(Request $request)
  {
    try {
      $users = User::role(Role::USER)
        ->where(function($q) use($request) {
          $q->where(DB::raw('CONCAT(first_name," ",last_name)'),'LIKE','%'.$request->search.'%')
            ->orWhere('username','LIKE','%'.$request->search.'%');
        })
        ->get();

      return response()->json($users, 200);
    }
    catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function tokens(Request $request)
  {
    try {
      $tokens = Tokens::where([
        ['name','LIKE','%'.$request->search.'%'],
        ['is_interest', '=', 0]
        ])
        ->get();

      return response()->json($tokens, 200);
    }
    catch (Exception $e) {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }
}
