<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Exception;
use DataTables;

class UserService {

  public function store(Request $request)
  {
    $randomName = Str::random(30);

    try {
      if($request->hasFile('profile'))
      {
        $renamed = $randomName.'.'.$request->profile->getClientOriginalExtension();
        $path = public_path('/profiles');
        $request->profile->move($path, $renamed);
        $request['profile'] = isset($renamed) ? $path.'/'.$renamed : null;
      }
      $request['password'] = bcrypt($request->password);
      User::create($request->toArray());

      return response()->json(['message' => 'Successfully created.'], 200);
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
      $user = User::findOrFail($id);
      return response()->json($user, 200);
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
      $randomName = Str::random(30);
      if($request->hasFile('profile'))
      {
        $renamed = $randomName.'.'.$request->profile->getClientOriginalExtension();
        $path = public_path('/profiles');
        $request->profile->move($path, $renamed);
        $request['profile'] = isset($renamed) ? $path.'/'.$renamed : null;
      }
      if($request->has('password'))
      {
        $request['password'] = bcrypt($request->password);
      }
      $user = User::findOrFail($id);
      $user->update($request->toArray());

      return response()->json(['message' => 'Successfully updated.'], 200);
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
      $user = User::findOrFail($id);
      $user->delete();

      return response()->json(['message' => 'Successfully deleted.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $users = User::all();
    return DataTables::of($users)
      ->addColumn('name', function($q) {
        $avatar = !is_null($q->profile) ? url($q->profile) : url('shared/img/avatar/31.png');
        return '<img src="'.$avatar.'" class="flag-img" alt="Philippines">'.$q->full_name;
      })
      ->addColumn('email', function($q) {
        return '<span class="text-info">'.$q->email.'</span>';
      })
      ->addColumn('phone', function($q) {
        return $q->contact_no;
      })
      ->addColumn('total_tokens', function($q) {
        return 0.00;
      })
      ->addColumn('status', function($q) {
        return $q->is_active > 0 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
      })
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
      ->rawColumns(['name','email','total_tokens','status','phone','options'])
      ->make(true);
  }

}