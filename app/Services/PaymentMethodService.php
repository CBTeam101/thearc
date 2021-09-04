<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Exception;
use DataTables;

class PaymentMethodService {

  public function store(Request $request)
  {
    try {
      PaymentMethod::create($request->toArray());
      return response()->json(['message' => 'PaymentMethod created successfully.'], 201);
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
      $role = PaymentMethod::findOrFail($id);
      return response()->json($role, 200);
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
      $role = PaymentMethod::findOrFail($id);
      $role->update($request->toArray());
      return response()->json(['message' => 'PaymentMethod successfully updated.'], 200);
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
      $role = PaymentMethod::findOrFail($id);
      $role->delete();
      return response()->json(['message' => 'PaymentMethod successfully deleted.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $payment_methods = PaymentMethod::query();
    return DataTables::of($payment_methods)
      ->addColumn('options', function($q) {
        return '<div class="td-actions">
        <a href="javascript:void(0);" id="'.$q->id.'" class="icon blue payment-method-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Row">
          <i class="icon-edit-2"></i>
        </a>
        <a href="javascript:void(0);" id="'.$q->id.'" class="icon red payment-method-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Row">
          <i class="icon-cancel"></i>
        </a>
      </div>';
      })
      ->rawColumns(['options'])
      ->make(true);
  }

}