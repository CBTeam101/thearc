<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\TransactionType;
use Exception;
use DataTables;

class TransactionTypeService {

  public function store(Request $request)
  {
    try {
      TransactionType::create($request->toArray());
      return response()->json(['message' => 'TransactionType created successfully.'], 201);
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
      $role = TransactionType::findOrFail($id);
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
      $role = TransactionType::findOrFail($id);
      $role->update($request->toArray());
      return response()->json(['message' => 'TransactionType successfully updated.'], 200);
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
      $role = TransactionType::findOrFail($id);
      $role->delete();
      return response()->json(['message' => 'TransactionType successfully deleted.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $statuses = TransactionType::query();
    return DataTables::of($statuses)
      ->addColumn('options', function($q) {
        return '<div class="td-actions">
        <a href="javascript:void(0);" id="'.$q->id.'" class="icon blue transaction-type-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Row">
          <i class="icon-edit-2"></i>
        </a>
      </div>';
      })
      ->rawColumns(['options'])
      ->make(true);
  }

}