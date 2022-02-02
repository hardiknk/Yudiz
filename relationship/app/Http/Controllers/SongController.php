<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;

class SongController extends Controller
{
    //
    public function show_song()
    {
        # show song 
        // $data = Singer::find(8)->songs; 
        // echo '<pre>'; print_r($data); exit; 
        // dd(Singer::find(8)->songs);
        // dd(Singer::find(9)->songs);
        // dd(Singer::find(11)->songs);
        // eager loding relationshiop with songs 
        dd(Singer::with('songs')->get());
    }
}
