<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Matches;
use App\Models\ScoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    public function resultPage($id)
    {
        if (isset($_COOKIE["account_id"])) {
            $account_id = $_COOKIE["account_id"];
            $account = Account::where('id', $account_id)->first();
        }
        if ($account) {
            $match = Matches::select()
                ->with('team1', 'team2', 'poll', 'tournament')
                ->where('id', '=', $id)
                ->first();
            return view('public.result', compact('account', 'match'));
        } else {
            Session::flash('message', 'Please login to view your account');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }

    public function resultPageScore($id)
    {
        if (isset($_COOKIE["account_id"])) {
            $account_id = $_COOKIE["account_id"];
            $account = Account::where('id', $account_id)->first();
        }
        if ($account) {
            $match = Matches::select()
                ->with('team1', 'team2', 'poll', 'tournament')
                ->where('id', '=', $id)
                ->first();
            return view('public._partials.result.score', compact('account', 'match'));
        } else {
            Session::flash('message', 'Please login to view your account');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }

    function createImageFromBase64(Request $request)
    {
        if ($request->image) {
            $img = $request->image;
            $folderPath = "storage/images/scores/"; //path location
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $uniqid = uniqid();
            $file = $folderPath . $uniqid . '.' . $image_type;
            file_put_contents($file, $image_base64);

            $scoreImage =  ScoreImage::updateOrCreate(
                [
                    'match_id' => $request->match,
                    'account_id' => $request->account,
                ],
                [
                    'image' => $file
                ]
            );
            return $this->respondWithSuccess("Image uploaded successfully", $scoreImage);
        }
    }
}
