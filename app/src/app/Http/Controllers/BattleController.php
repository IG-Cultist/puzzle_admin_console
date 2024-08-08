<?php

namespace App\Http\Controllers;

use App\Models\BattleMode;
use App\Models\Deck;
use App\Models\Result;
use App\Models\UsableCard;
use Illuminate\Http\Request;

class BattleController extends Controller
{
    public function index()
    {
        return view('battles.battle');
    }

    public function show(Request $request)
    {
        $data = BattleMode::where('user_id', '=', $request->search)->get();
        return view('battles.battle', ['user' => $data]);
    }

    public function update()
    {

    }

    public function deck()
    {
        return view('battles.deck');
    }

    public function showDeck(Request $request)
    {
        $data = Deck::where('user_id', '=', $request->search)->get();
        return view('battles.deck', ['user' => $data]);
    }

    public function deckUpdate()
    {

    }

    public function result()
    {
        return view('battles.result');
    }

    public function showResult(Request $request)
    {
        $data = Result::where('winner_id', '=', $request->search)->get();
        return view('battles.result', ['user' => $data]);
    }

    public function resultUpdate()
    {

    }

    public function usableCard()
    {
        $data = UsableCard::All();
        return view('battles.usableCard', ['card' => $data]);
    }
}
