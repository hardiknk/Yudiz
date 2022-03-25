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

        $song_id = [1, 6, 7];
        //here attach is atech model to the parent
        $singer->songs()->attach($song_id);
    }

    //this function is find which song create by which signer
    public function show_singer()
    {
        // dd(Song::with('singer')->get());
        // dd(Song::find(1)->singer);
        $song_data =  Song::find(1)->singer;
        echo "<pre>";
        print_r($song_data);
        //about query is run 
        //first => select * from `songs` where `songs`.`id` = 1 limit 1
        //second => select `singers`.*, `singer_songs`.`song_id` as `pivot_song_id`, `singer_songs`.`singer_id` as `pivot_singer_id` from `singers` inner join `singer_songs` on `singers`.`id` = `singer_songs`.`singer_id` where `singer_songs`.`song_id` = 1;
    }
}
