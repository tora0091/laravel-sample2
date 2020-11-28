<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalWindowController extends Controller
{
    public function index()
    {
        return view('favorite_player.index');
    }

    public function favoritePlayer(Request $request)
    {
        $validated = $request->validate([
            'selected_number' => 'required|between:1,5',
        ]);

        $selected_number = $validated['selected_number'];
        $player_list = $this->getPlayerList($selected_number);

        return response()->json($player_list);
    }

    private function getPlayerList($number)
    {
        $player_list = [
            1 => [
                10001 => 'Jaylen Brown',
                10002 => 'Marcus Smart',
                10003 => 'Jayson Tatum',
                10004 => 'Kemba Walker',
            ],
            2 => [
                20001 => 'RJ Barrett',
                20002 => 'Taj Gibson',
                20003 => 'Frank Ntilikina',
                20004 => 'Elfrid Payton',
            ],
            3 => [
                30001 => 'Joel Embiid',
                30002 => 'Ben Simmons',
                30003 => 'Tobias Harris',
                30004 => 'Al Horford',
            ],
            4 => [
                40001 => 'LeBron James',
                40002 => 'Anthony Davis',
                40003 => 'JaVale McGee',
                40004 => 'Dwight Howard',
            ],
            5 => [
                50001 => 'Stephen Curry',
                50002 => 'Klay Thompson',
                50003 => 'Eric Paschall',
                50004 => 'Andrew Wiggins',
            ],
        ];
        return $player_list[$number];
    }
}
