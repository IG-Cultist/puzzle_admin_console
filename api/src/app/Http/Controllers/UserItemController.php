<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserItemResource;
use App\Models\UserItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserItemController extends Controller
{
    public function index()
    {

    }

    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $items = $user->items;
        $responce['items']
            = UserItemResource::collection($items);
        return response()->json($responce);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'item_id' => ['required', 'int'],
            'use_item' => ['int'],
            'get_item' => ['int'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $userItem = UserItem::where('user_id', '=', $request->user_id)
            ->where('item_id', '=', $request->item_id)->get();

        if (count($userItem) !== 0) { #すでに所持している場合
            if (isset($request->use_item)) { #アイテムが消費された場合
                if ($userItem[0]['item_num'] !== 0) { #0以外で実行
                    $userItem[0]['item_num'] -= $request->use_item;
                }
            }
            if (isset($request->get_item)) { #アイテムが追加された場合
                $userItem[0]['item_num'] += $request->get_item;
            }
            $userItem[0]->save();
        } else { #新しく入手した場合
            UserItem::create([
                'user_id' => $request->user_id,
                'item_id' => $request->item_id,
                'item_num' => $request->get_item
            ]);
        }
        return response()->json();
    }
}
