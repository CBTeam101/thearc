<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Menu;
use Exception;
use DataTables;

class MenuService {

  public function store(Request $request)
  {
    try {
      Menu::create($request->toArray());
      return response()->json(['message' => 'Menu created successfully.'], 201);
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
      $role = Menu::findOrFail($id);
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
      $role = Menu::findOrFail($id);
      $role->update($request->toArray());
      return response()->json(['message' => 'Menu successfully updated.'], 200);
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
      $role = Menu::findOrFail($id);
      $role->delete();
      return response()->json(['message' => 'Menu successfully deleted.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $menus = Menu::query();
    return DataTables::of($menus)
      ->addColumn('options', function($q) {
        return '<div class="td-actions">
        <a href="javascript:void(0);" id="'.$q->id.'" class="icon blue role-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Row">
          <i class="icon-edit-2"></i>
        </a>
        <a href="javascript:void(0);" id="'.$q->id.'" class="icon red role-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Row">
          <i class="icon-cancel"></i>
        </a>
      </div>';
      })
      ->rawColumns(['options'])
      ->make(true);
  }

}