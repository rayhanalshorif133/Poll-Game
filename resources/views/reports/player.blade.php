@extends('layouts.app')

@section('head')
<style>
    .breadcrumb{
        background-color: transparent!important;
    }
    .content-header h1 {
        font-size: 1.8rem;
        margin: 0;
    }
</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Player's Report</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Player's Report</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#player_s_Info" data-toggle="tab">
                    <i class="fas fa-user"></i> Player's Info
                </a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="player_s_Info">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Player's Search By Phone Number
                                </h3>
                            </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-4 col-form-label">
                                            Enter phone number
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-times"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-info float-right">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>

                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="timeline">
                    Joining Chats
                </div>

                <div class="tab-pane" id="settings">
                    Settings
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>
    var phone_number = "";
    $(function () {
        phoneNumberSearchHandler();
    });

    phoneNumberSearchHandler = () => {
        $('#phone_number').on('keyup', function (e) {
            phone_number = $(this).val();
            if(e.keyCode == 69 || e.keyCode == 189){
                $(this).val("");
            }
            if (e.keyCode === 13) {
                if (validatePhone(phone_number) === false) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Invalid phone number'
                    });
                }
            }
            if(phone_number.length > 11){
                $(this).val(phone_number.substring(0, 11));

                Toast.fire({
                    icon: 'error',
                    title: 'Phone number must be 11 digits'
                });
            }
        });
    };

    validatePhone = (phone_number) => {
        var filter = /^(?:\+88|01)?\d{11}\r?$/;
        if (filter.test(phone_number)) {
            return true;
        }
        else {
            return false;
        }
    };
</script>

@endpush
