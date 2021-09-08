<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Tokens as Token;
use Exception;

class HelperService {
  public function currentPrice($id)
  {
    try {
      $token = Token::findOrFail($id);
      return response()->json($token->price, 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

}