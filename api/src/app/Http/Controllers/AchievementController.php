<?php

namespace App\Http\Controllers;

use App\Http\Resources\AchievementResource;
use App\Http\Resources\UserAchievementResource;
use App\Models\Achievement;
use App\Models\UserAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class AchievementController extends Controller
{
    public function index()
    {
        $achievement = Achievement::All();
        return response()->json(AchievementResource::collection($achievement));   #collectionで複数所得
    }

    public function userAchievement_show(Request $request)
    {
        $user = UserAchievement::findOrFail($request->user_id);
        return response()->json(UserAchievementResource::make($user));
    }

    public function userAchievement_update(Request $request)
    {
        try {
            //トランザクション処理
            DB::transaction(function () use ($request) {
                $validator = Validator::make($request->all(), [
                    'user_id' => ['required', 'int'],
                    'achievement_id' => ['required', 'int'],
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                # リクエストされたユーザID指定で取得
                $userAchievement = UserAchievement::where('user_id', '=', $request->user_id)
                    ->where('achievement_id', '=', $request->achievement_id)->get();

                if (count($userAchievement) !== 0) { #すでに所持している場合、エラーを返す
                    return response()->json($validator->errors(), 400);
                } else { #新しく入手した場合
                    UserAchievement::create([
                        'user_id' => $request->user_id,
                        'achievement_id' => $request->achievement_id,
                        'progress' => $request->progress,
                    ]);
                }
            });
            return response()->json();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

}
