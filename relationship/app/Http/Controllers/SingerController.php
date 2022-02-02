<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    //
    public function add_singer()
    {
        $singer = new Singer();
        $singer->s_name = 'Chirag ';
        $singer->save();

        $song_id = [1,6,7];
        //here attach is atech model to the parent
        $singer->songs()->attach($song_id);
    }

    //this function is find which song create by which signer
    public function show_singer()
    {
        // dd(Song::with('singer')->get());
        dd(Song::find(2)->singer);
    }
}
