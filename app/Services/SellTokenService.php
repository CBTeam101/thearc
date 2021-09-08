<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\SellToken;
use App\Enums\Status;
use Exception;
use DataTables;

class SellTokenService  {

  public function store(Request $request)
  {
    try {
      $request['owner_id'] = auth()->user()->id;
      $request['status_id']= Status::PENDING;
      SellToken::create($request->toArray());
      return response()->json(['message' => 'SellToken created successfully.'], 201);
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
      $sellToken = SellToken::with(['owner','recipient','tokenType','status','paymentMethod'])->findOrFail($id);
      return response()->json($sellToken, 200);
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
      $sellToken = SellToken::findOrFail($id);
      $sellToken->update($request->toArray());
      return response()->json(['message' => 'SellToken successfully updated.'], 200);
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
      $sellToken = SellToken::findOrFail($id);
      $sellToken->delete();
      return response()->json(['message' => 'SellToken successfully deleted.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $sellTokens = SellToken::query();
    return DataTables::of($sellTokens)
      ->addColumn('owner', function($q) {
        return $q->owner->full_name;
      })
      ->addColumn('recipient', function($q) {
        return $q->recipient->full_name;
      })
      ->addColumn('token_type', function($q) {
        return $q->tokenType->name;
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
      ->addColumn('payment_method', function($q) {
        return '<div class="text-center"><span class="badge bg-primary">' . $q->paymentMethod->name . '</span></div>';
      })
      ->addColumn('date_created', function($q) {
        return $q->created_at->format('Y-m-d h:i:s A');
      })
      ->addColumn('options', function($q) {
        $edit = '';
        $accept = '';
        $cancel = '';
        $delete = '';
        if($q->status->id === Status::COMPLETED)
        {
          $delete = '<a href="javascript:void(0);" id="'.$q->id.'" class="icon red sell-token-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Row">
                    <i class="icon-trash"></i>
                  </a>';
        }
        if($q->status->id === Status::PENDING)
        {
          $cancel = '<a href="javascript:void(0);" id="'.$q->id.'" class="icon red sell-token-cancel" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Row">
                      <i class="icon-cancel"></i>
                    </a>';
        }

        if($q->status->id === Status::PENDING && auth()->user()->id === $q->recipient_id)
        {
          $accept = '<a href="javascript:void(0);" id="'.$q->id.'" class="icon green sell-token-accept" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Row">
                      <i class="icon-check"></i>
                    </a>';
        }

        if($q->status->id === Status::PENDING && auth()->user()->id === $q->owner_id)
        {
          $edit = '<a href="javascript:void(0);" id="'.$q->id.'" class="icon blue sell-token-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add Row">
                    <i class="icon-edit-2"></i>
                  </a>';
        }

        return '<div class="td-actions">'.$edit.$accept.$cancel.$delete.'</div>';
      })
      ->rawColumns(['options','status','payment_method'])
      ->make(true);
  }


  public function approve($id)
  {
    try {
      $sellToken = SellToken::findOrFail($id);
      $sellToken->approved_at = now();
      $sellToken->status_id = Status::COMPLETED;
      $sellToken->save();
      return response()->json(['message' => 'SellToken successfully approved.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }


  public function cancel($id)
  {
    try {
      $sellToken = SellToken::findOrFail($id);
      $sellToken->cancelled_at = now();
      $sellToken->status_id = Status::CANCEL;
      $sellToken->save();
      return response()->json(['message' => 'SellToken successfully cancelled.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

}