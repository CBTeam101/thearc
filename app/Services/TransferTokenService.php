<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\TransferToken;
use App\Enums\Status;
use Exception;
use DataTables;

class TransferTokenService  {

  public function store(Request $request)
  {
    try {
      $request['owner_id'] = auth()->user()->id;
      $request['status_id']= Status::TRANSFER;
      $giftToken = TransferToken::create($request->toArray());

      return response()->json(['message' => 'TransferToken successfully created.'], 200);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function edit($id)
  {
    try {}
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function update(Request $request, $id)
  {
    try {}
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function destroy($id)
  {
    try {
      $giftToken = TransferToken::findOrFail($id);
      $giftToken->delete();

      return response()->json(['message' => 'TransferToken successfully deleted.']);
    }
    catch (Exception $e)
    {
      $bug = $e->getMessage();
      return response()->json(['message' => $bug], 500);
    }
  }

  public function datatable()
  {
    $giftTokens = TransferToken::query();
    return DataTables::of($giftTokens)
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
        } else if ($q->status->id === Status::GIFT) {
          $color = 'bg-danger';
        } else if ($q->status->id === Status::TRANSFER) {
          $color = 'bg-warning';
        } 

        return '<span class="badge ' . $color . '">' . $q->status->name . '</span>';
      })
      ->addColumn('date_created', function($q) {
        return $q->created_at->format('Y-m-d h:i:s A');
      })
      ->addColumn('options', function($q) {
        $delete = '';

        if($q->status->id === Status::TRANSFER)
        {
          $delete = '<a href="javascript:void(0);" id="'.$q->id.'" class="icon red transfer-token-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Row">
                    <i class="icon-trash"></i>
                  </a>';
        }

        return '<div class="td-actions">'.$delete.'</div>';
      })
      ->rawColumns(['options','status','payment_method'])
      ->make(true);
  }
}