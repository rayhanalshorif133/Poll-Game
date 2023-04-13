<form action="{{route('match.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$match->id}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title" class="required">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{$match->title}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="required">Select Tournament</label>
                <select name="tournament_id" id="tournament_id" class="form-control">
                    @foreach($tournaments as $tournament)
                    @if($match->tournament_id == $tournament->id)
                    <option value="{{$tournament->id}}" selected>{{$tournament->name}}</option>
                    @else
                    <option value="{{$tournament->id}}">{{$tournament->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="required">Select Team 1</label>
                <select name="team_1" id="team_1" class="form-control">
                    <option value="" disabled>Select Team 1</option>
                    @foreach($teams as $team)
                    @if($match->team1->id == $team->id)
                    <option value="{{$team->id}}" selected>{{$team->name}}</option>
                    @else
                    <option value="{{$team->id}}">{{$team->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="required">Select Team 2</label>
                <select name="team_2" id="team_2" class="form-control">
                    <option value="" disabled>Select Team 2</option>
                    @foreach($teams as $team)
                    @if($match->team2->id == $team->id)
                    <option value="{{$team->id}}" selected>{{$team->name}}</option>
                    @else
                    <option value="{{$team->id}}">{{$team->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        {{-- start date and end date --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="required">Select Start Date</label>
                @php
                $start_date = date('d/m/Y H:i:s', strtotime($match->start_date_time));
                $end_date = date('d/m/Y H:i:s', strtotime($match->end_date_time));

                // 2018-07-22
                $start_only_date = date('Y-m-d', strtotime($match->start_date_time));
                $end_only_date = date('Y-m-d', strtotime($match->end_date_time));
                $start_only_time = date('H:i:s', strtotime($match->start_date_time));
                $end_only_time = date('H:i:s', strtotime($match->end_date_time));
                @endphp
                <div class="d-flex date_time">
                    <input type="date" class="form-control" name="start_date" value="{{$start_only_date}}">
                    <input type="time" class="form-control" name="start_time" value="{{$start_only_time}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="required">Select End Date</label>
                <div class="d-flex date_time">
                    <input type="date" class="form-control" name="end_date" value="{{$end_only_date}}">
                    <input type="time" class="form-control" name="end_time" value="{{$end_only_time}}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                @include('layouts.common.update_status', ['status' => $match->status])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"
                    placeholder="Enter description">{!! $match->description !!}</textarea>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
</form>
