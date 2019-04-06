<?php

namespace App\Http\Controllers;

use App\Meme;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $geek_data = $request->input('data');
        foreach($geek_data as $memes) {
            foreach($memes as $meme) {
                $m = new Meme;
                $m->url = $meme['url'];
                $m->title = $meme['title'];
                $m->category = $meme['category'];
                $m->save();
            }
        }
    }

    private static function imgresize($meme_num, $ext) {
        $new_width = 500;
        $new_height = 500;

        $thumb = imagecreatetruecolor($new_width, $new_height);
        $filename = '/tmp//' . $meme_num . '.' . $ext;
        list($width, $height) = getimagesize($filename);

        $source = null;

        try {
            if (strtolower($ext) == 'jpg' || strtolower($ext) == 'jpeg') {
                $source = imagecreatefromjpeg($filename);
            } else if (strtolower($ext) == 'png') {
                $source = imagecreatefrompng($filename);
            } else if (strtolower($ext) == 'gif') {
                $source = imagecreatefromgif($filename);
            }

            if (!is_null($source)) {
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                if (strtolower($ext) == 'jpg' || strtolower($ext) == 'jpeg') {
                    imagejpeg($thumb, public_path('img/' . $meme_num . '.' . $ext));
                } else if (strtolower($ext) == 'png') {
                    $source = imagepng($thumb, public_path('img/' . $meme_num . '.' . $ext));
                } else if (strtolower($ext) == 'gif') {
                    $source = imagegif($thumb, public_path('img/' . $meme_num . '.' . $ext));
                }
            } else {
                $img = file_get_contents($filename);
                file_put_contents(public_path('img/' . $meme_num . '.' . $ext), $img);
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function leaderboard(Request $request) {
        $top_categories = DB::table('memes')
                     ->select(DB::raw('avg(rating) as rating_avg, category'))
                     ->groupBy('category')
                     ->orderBy('rating_avg', 'desc')
                     ->limit(3)
                     ->get();
        $memes = [];
        foreach ($top_categories as $category) {
            $m = Meme::where('category', $category->category)->orderBy('rating', 'desc')->limit(3)->get();
            foreach ($m as $tmp) {
                $tmp_info = pathinfo($tmp->url);
                
                $img = file_get_contents($tmp->url);
                file_put_contents('/tmp//' . $tmp->id . '.' . $tmp_info["extension"], $img);
                self::imgresize($tmp->id, $tmp_info["extension"]);
            }
            $memes[$category->category] = $m;
        }
        return view('leaderboard', ["memes" => $memes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mashup(Request $request)
    {
        $q = $request->query();
        $m1 = new Meme;
        if (count($q) == 4) {
            $m1_url = urldecode($q["url"]);
            $m1->url = $m1_url;
            $m1->title = $q["title"];
            $m1->category = $q["category"];
            $m1->save();
        } else {
            $m1 = Meme::inRandomOrder()->first();
        }
        $m2 = Meme::inRandomOrder()->first();
        if ($m1->id == $m2->id) {
            $m2 = Meme::inRandomOrder()->first();
        }

        $m1_info = pathinfo($m1->url);
        $m2_info = pathinfo($m2->url);
        
        $img1 = file_get_contents($m1->url);
        file_put_contents('/tmp/m1.' . $m1_info["extension"], $img1);

        if (self::imgresize("m1", $m1_info["extension"]) === false) {
            $m1->destroy($m1->id);
            $m1 = Meme::inRandomOrder()->first();
            $m1_info = pathinfo($m1->url);
            $img1 = file_get_contents($m1->url);
            file_put_contents('/tmp/m1.' . $m1_info["extension"], $img1);
            self::imgresize("m1", $m1_info["extension"]);
        }

        $img2 = file_get_contents($m2->url);
        file_put_contents('/tmp/m2.' . $m2_info["extension"], $img2);

        if (self::imgresize("m2", $m2_info["extension"]) === false) {
            $m2->destroy($m2->id);
            $m2 = Meme::inRandomOrder()->first();
            $m2_info = pathinfo($m2->url);
            $img2 = file_get_contents($m2->url);
            file_put_contents('/tmp/m2.' . $m2_info["extension"], $img2);
            self::imgresize("m2", $m2_info["extension"]);
        }

        return view('mash', ["m1_id" => $m1->id, "m2_id" => $m2->id, "m1_ext" => $m1_info["extension"], "m2_ext" => $m2_info["extension"]]);
    }

    private static function probability($rating1, $rating2) {
        return 1.0 * 1.0 / (1 + 1.0 * pow(10, 1.0 * ($rating1 - $rating2) / 400));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $q = $request->query();
        $k = 100;

        if (count($q) == 3 && array_key_exists("m1_id", $q) && array_key_exists("m2_id", $q) && array_key_exists("win", $q)) {

            $m1 = Meme::find($q["m1_id"]);
            $m2 = Meme::find($q["m2_id"]);

            $pb = self::probability($m1->rating, $m2->rating);

            $pa = self::probability($m2->rating, $m2->rating);

            if ($q["win"] == "m1") {
                $m1_rating = $m1->rating + $k * (1 - $pa);
                $m2_rating = $m2->rating + $k * (0 - $pb);
                $m1->upvotes = $m1->upvotes + 1;
                $m2->downvotes = $m2->downvotes + 1;
            } else {
                $m1_rating = $m1->rating + $k * (0 - $pa);
                $m2_rating = $m2->rating + $k * (1 - $pb);
                $m1->downvotes = $m1->downvotes + 1;
                $m2->upvotes = $m2->upvotes + 1;
            }

            $m1->rating = round($m1_rating, 2);
            $m2->rating = round($m2_rating, 2);

            $m1->save();
            $m2->save();

        }
    }

}
