<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Models\Mail;
use App\Models\UserItem;
use App\Models\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class MailController extends Controller
{
    public function index()
    {
        $user = Mail::All();
        return response()->json(MailResource::collection($user));   #collectionで複数所得
    }

    public function update(Request $request)
    {
        try {
            //トランザクション処理
            DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'user_id' => ['required', 'int'],
                    'mail_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # 指定ユーザIDで検索
                $userMail = UserMail::where('mail_id', '=', $request->mail_id)
                    ->where('user_id', '=', $request->user_id)->get();

                if (count($userMail) === 0) { #そのメールがない場合
                    return response()->json($validator->errors(), 400);
                } else { #すでに受信していた場合
                    if ($userMail[0]['isOpen'] === 0) { #未開封の場合、開封済みにして添付アイテムを付与
                        $userMail[0]->update(['isOpen' => 1]);

                        $mail = Mail::where('id', '=', $request->mail_id)->get();

                        $userItem = UserItem::where('user_id', '=', $request->user_id)
                            ->where('item_id', '=', $mail[0]['item_id'])->get();

                        if (count($userItem) === 0) { #新しく所有する場合、create
                            UserItem::create([
                                'user_id' => $request->user_id,
                                'item_id' => $mail[0]['item_id'],
                                'item_num' => $mail[0]['item_sum'],
                                'isOpen' => 0
                            ]);
                        } else { #すでに同じアイテムを持ってい居た場合、加算
                            $userItem[0]['item_num'] += $mail[0]['item_sum'];
                        }
                    }
                }
            });
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
}
