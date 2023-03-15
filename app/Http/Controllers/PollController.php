<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;


class PollController extends Controller
{

    public function index(Request $request)
    {
        $navItem = 'poll-list';
        if ($request->ajax()) {
            $data = Poll::select()
                ->with('match', 'createdBy', 'updatedBy')->get();
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
        return view('poll.index', compact('navItem'));
    }


    public function poll_page($matchId)
    {
        $match = Matches::select()
            ->where('id', $matchId)
            ->with('team1', 'team2', 'poll', 'tournament', 'tournament.sports', 'tournament.createdBy', 'tournament.updatedBy')->first();
        return view('public.poll.index', compact('match'));
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
        ]);


        $poll = new Poll();
        $poll->match_id = $request->match_id;
        $poll->question = $request->question;

        if ($request->file('question_images')) {
            foreach ($request->file('question_images') as $image) {
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('storage/images/questions'), $imageName);
                $imageName = 'storage/images/questions/' . $imageName;
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
                    $imageName = time() . '.' . $request->$getOption->extension() . $index;
                    $request->$getOption->move(public_path('storage/images/questions'), $imageName);
                    $imageName = 'storage/images/questions/' . $imageName;
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
        $poll->status = $request->status ? $request->status : 'Active';
        $poll->description = $request->description ? $request->description : null;
        $poll->created_by = auth()->user()->id;
        $poll->updated_by = auth()->user()->id;

        $poll->save();
        Session::flash('success', 'Poll created successfully.');
        Session::flash('class', 'success');
        return redirect()->back();
        // return redirect()->route('poll.index');

        /*

        'match_id',
        'question',
        'images',
        'option_type',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'answer',
        'status',
        'description',
        'created_by',
        'updated_by',



        */
    }
}
