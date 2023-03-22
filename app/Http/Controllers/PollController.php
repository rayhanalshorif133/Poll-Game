<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Matches;
use App\Models\Participate;
use App\Models\Poll;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use DateTime;



class PollController extends Controller
{

    public function index(Request $request, $match_id = null, $day = null)
    {
        $navItem = 'poll-list';
        $matches = Matches::select()->get();
        if ($request->ajax()) {
            if ($day) {
                $data = Poll::select()
                    ->where('match_id', $match_id)
                    ->where('day', $day)
                    ->with('match', 'createdBy', 'updatedBy')->get();
            } else if ($match_id) {
                $data = Poll::select()
                    ->where('match_id', $match_id)
                    ->with('match', 'createdBy', 'updatedBy')
                    ->get();
            } else {
                $data = Poll::select()
                    ->with('match', 'createdBy', 'updatedBy')->get();
            }

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('description', function ($row) {
                    $text = strip_tags($row->description);
                    return strlen($text) > 50 ? substr($text, 0, 50) . '...' : $text;
                })
                ->addColumn('action', function ($row) {
                    return true;
                })
                ->make(true);
        }
        return view('poll.index', compact('navItem', 'matches'));
    }




    public function create()
    {
        $navItem = 'poll-create';
        $matches = Matches::select()->get();
        $optionTypes = ['Text', 'Image'];
        $answerOptions = [
            ['value' => 'option_1', 'name' => 'Option 1'],
            ['value' => 'option_2', 'name' => 'Option 2']
        ];
        return view('poll.create', compact('navItem', 'matches', 'optionTypes', 'answerOptions'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'match_id' => 'required',
            'question' => 'required',
            'option_type' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'answer' => 'required',
            'point' => 'required',
            'day' => 'required',
        ]);


        $poll = new Poll();
        $poll->match_id = $request->match_id;
        $poll->question = $request->question;


        if ($request->file('question_images')) {
            foreach ($request->file('question_images') as $key => $image) {
                $imageName = time() . '_' . $key + "_" . $image->extension();
                $image->move(public_path('storage/images/questions'), $imageName);
                $imageName = '/storage/images/questions/' . $imageName;
                $data[] = $imageName;
            }
            $poll->images = json_encode($data);
        }
        $poll->option_type = $request->option_type == 1 ? 'image' : 'text';
        // option type 0 = text
        // option type 1 = image
        if ($request->option_type == 1) {
            for ($index = 1; $index <= 4; $index++) {
                if ($request->file('option' . $index)) {
                    $getOption = 'option' . $index;
                    $pullOption = 'option_' . $index;
                    $imageName = time() . '.' . $index . $request->$getOption->extension();
                    $request->$getOption->move(public_path('storage/images/questions'), $imageName);
                    $imageName = '/storage/images/questions/' . $imageName;
                    $poll->$pullOption = $imageName;
                }
            }
        } else {
            for ($index = 1; $index <= 4; $index++) {
                $getOption = 'option' . $index;
                $pullOption = 'option_' . $index;
                if ($request->$getOption) {
                    $poll->$pullOption = $request->$getOption;
                }
            }
        }
        $poll->answer = $request->answer ? $request->answer : null;
        $poll->point = $request->point ? $request->point : 0;
        $poll->status = $request->status ? $request->status : 'Active';
        $poll->description = $request->description ? $request->description : null;
        $poll->day = $request->day;
        $poll->created_by = auth()->user()->id;
        $poll->updated_by = auth()->user()->id;

        $poll->save();
        Session::flash('success', 'Poll created successfully.');
        Session::flash('class', 'success');
        return redirect()->route('poll.index');
    }



    public function viewAndEdit($id)
    {
        $navItem = 'poll-list';
        $poll = Poll::select()
            ->where('id', $id)
            ->with('match', 'createdBy', 'updatedBy')->first();
        $poll->images = json_decode($poll->images);
        $matches = Matches::select()->get();
        $optionTypes = ['Text', 'Image'];
        $answerOptions = [
            ['value' => 'option_1', 'name' => 'Option 1'],
            ['value' => 'option_2', 'name' => 'Option 2']
        ];
        return view('poll.view', compact('navItem', 'poll', 'matches', 'optionTypes', 'answerOptions'));
    }


    public function update(Request $request)
    {
        $poll = Poll::find($request->update_poll_id);
        $poll->match_id = $request->match_id;
        $poll->question = $request->question;

        if ($request->file('question_images')) {
            foreach ($request->file('question_images') as $key => $image) {
                $imageName = time() . '_' . $key + "_" . $image->extension();
                $image->move(public_path('storage/images/questions'), $imageName);
                $imageName = '/storage/images/questions/' . $imageName;
                $data[] = $imageName;
            }
            $poll->images = json_encode($data);
        }
        $poll->option_type = $request->option_type == 1 ? 'image' : 'text';
        // option type 0 = text
        // option type 1 = image
        if ($request->option_type == 1) {
            for ($index = 1; $index <= 4; $index++) {
                if ($request->file('option' . $index)) {
                    $getOption = 'option' . $index;
                    $pullOption = 'option_' . $index;
                    $imageName = time() . '.' . $index . $request->$getOption->extension();
                    $request->$getOption->move(public_path('storage/images/questions'), $imageName);
                    $imageName = '/storage/images/questions/' . $imageName;
                    $poll->$pullOption = $imageName;
                }
            }
        } else {
            for ($index = 1; $index <= 4; $index++) {
                $getOption = 'option' . $index;
                $pullOption = 'option_' . $index;
                if ($request->$getOption) {
                    $poll->$pullOption = $request->$getOption;
                }
            }
        }

        if ($request->option_type == 1) {
            if ($request->file('answer')) {
                $imageName = time() . '.' . $request->answer->extension();
                $request->answer->move(public_path('storage/images/questions'), $imageName);
                $imageName = '/storage/images/questions/' . $imageName;
                $poll->answer = $imageName;
            } else {
                $poll->answer = $request->answer ? $request->answer : $poll->answer;
            }
        } else {
            $poll->answer = $request->answer ? $request->answer : $poll->answer;
        }
        $poll->point = $request->point ? $request->point : 0;
        $poll->status = $request->status ? $request->status : 'Active';
        $poll->description = $request->description ? $request->description : null;
        $poll->day = $request->match_day ? $request->match_day : $poll->day;
        $poll->updated_by = auth()->user()->id;

        $poll->save();
        Session::flash('success', 'Poll updated successfully.');
        Session::flash('class', 'success');
        return redirect()->route('poll.index');
    }


    public function delete($id)
    {


        $poll = Poll::find($id);
        $poll->delete();
        Session::flash('success', 'Poll deleted successfully.');
        Session::flash('class', 'success');
        return redirect()->route('poll.index');
    }


    public function search(Request $request)
    {
        $match_id = $request->match_id;
        $data = Poll::select()
            ->where('match_id', $match_id)
            ->with('match', 'createdBy', 'updatedBy')
            ->get();
        return $this->respondWithSuccess('Successfully fetch data', $data);
    }





    // Public Poll Page
    public function poll_page($matchId)
    {

        $phoneNumber = '01900000000';
        // random_int(10000000000, 99999999999);

        $match = Matches::select()
            ->where('id', $matchId)
            ->with('team1', 'team2', 'poll', 'tournament', 'tournament.sports', 'tournament.createdBy', 'tournament.updatedBy')->first();

        // Select Poll By Day::start
        $poll_day_calculate = $match->poll_day_calculate($matchId);
        $match->poll = $match->poll->where('day', $poll_day_calculate);

        // Select Poll By Day::end
        $findAccount = Account::select()
            ->where('phone', $phoneNumber)
            ->first();
        if (!$findAccount) {
            $account = Account::create([
                'phone' => $phoneNumber,
                'avatar' => 'web/images/account-img.png',
            ]);
            $findAccount = $account;
            Session::flash('success', 'You have successfully subscribed to this tournament.');
            Session::flash('class', 'success');
        } else {
            Session::flash('success', 'You have already subscribed to this tournament.');
            Session::flash('class', 'danger');
        }

        $cookie_name = "account_id";
        $cookie_value = $findAccount->id;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); // 86400 = 1 day
        $findParticipate = [];
        return view('public.poll', compact('match', 'findAccount', 'findParticipate', 'poll_day_calculate'));
    }


    public function poll_submit(Request $request)
    {

        $match = Matches::select()
            ->where('id', $request->match_id)
            ->with('tournament', 'tournament.sports')
            ->first();
        $start_date = $match->start_date_time;
        $start_date = date('d M Y h:i A', strtotime($start_date));
        $end_date = $match->end_date_time;
        $end_date = date('d M Y h:i A', strtotime($end_date));

        $current_date = date('d M Y h:i A');
        if ($current_date < $start_date) {
            Session::flash('message', 'Poll will be available after match start.');
            Session::flash('class', 'danger');
            return redirect()->route('public.sports-page.index', $match->tournament->sports_id);
        }
        if ($current_date > $end_date) {
            Session::flash('message', 'Tournaments Time Expired');
            Session::flash('class', 'danger');
            return redirect()->route('public.sports-page.index', $match->tournament->sports_id);
        }

        $request->validate([
            'poll_ids' => 'required',
        ]);

        foreach ($request->poll_ids as $key => $pollId) {
            $poll = Poll::select()
                ->where('id', $pollId)
                ->first();
            if (isset($_COOKIE["account_id"])) {
                $account_id = $_COOKIE["account_id"];
                $has_participated = Score::select()
                    ->where('poll_id', $pollId)
                    ->where('account_id', $account_id)
                    ->first();
                if (!$has_participated) {
                    $account = Account::select()
                        ->where('id', $account_id)
                        ->first();
                    $score = new Score();
                    $score->poll_id = $pollId;
                    $score->account_id = $account->id;
                    $score->match_id = $request->match_id;
                    $poll_id = 'given_ans_poll_id_' . $pollId;
                    $score->given_answer = $request->$poll_id;
                    if ($request->$poll_id == $poll->answer) {
                        $score->answer_status = 'correct';
                        $score->point = $poll->point;
                    } else {
                        $score->answer_status = 'wrong';
                        $score->point = 0;
                    }
                    $score->save();


                    // Update Participate Table::start
                    $findParticipate = Participate::select()
                        ->where('account_id', $account->id)
                        ->where('match_id', $request->match_id)
                        ->first();
                    if (!$findParticipate) {
                        $participate = new Participate();
                        $participate->account_id = $account->id;
                        $participate->match_id = $request->match_id;
                        $participate->point = $poll->point;
                        $participate->total_days = $poll->match->timeDiff($poll->match->id);
                        $participate->days = $poll->day;
                        $participate->save();
                    } else {
                        $findParticipate->point = $findParticipate->point + $poll->point;
                        $findParticipate->save();
                    }
                }
            }
        }
        Session::flash('message', 'Poll submitted successfully.');
        Session::flash('class', 'success');
        return redirect()->route('public.sports-page.index', $match->tournament->sports->id);
    }


    public function poll_image_delete($pollId, $image_item)
    {
        $poll = Poll::select()
            ->where('id', $pollId)
            ->first();
        $images = json_decode($poll->images);
        foreach ($images as $key => $image) {
            if ($key == $image_item) {
                // remove item from array
                \array_splice($images, $key, 1);
            }
        }
        $poll->images = json_encode($images);
        $poll->save();
        return $this->respondWithSuccess('Image deleted successfully.');
    }
}
