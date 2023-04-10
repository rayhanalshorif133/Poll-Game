var phone_number = "";
$(function () {
    phoneNumberSearchHandler();
    $(".reset-btn").click(resetBtnHandler);
    $(".search-btn").click(validationOfPhone);
});
resetBtnHandler = () => {
    $("#phone_number").val('8801923988380');
    $("#phone_number").focus().css("border-color", "red", "border-width", "2px");
    setTimeout(() => {
        $("#phone_number").css("border-color", "#ced4da", "border-width", "1px");
    }, 1000);
    let lodding = `
<div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
    <div class="bounce4"></div>
    <div class="bounce5"></div>
</div>
`;
    $(".player_infomation").html(lodding);
    $(".player_subscribed_tournament").html(lodding);
    $(".player_participate_tournament").html(lodding);
}
phoneNumberSearchHandler = () => {
    $("#phone_number").val('8801923988380');
    $('#phone_number').on('keyup', function (e) {
        phone_number = $(this).val();
        if (e.keyCode == 69 || e.keyCode == 189) {
            $(this).val("");
        }
        if (e.keyCode === 13) {
            validationOfPhone();
        }
        if (phone_number.length > 13) {
            $(this).val(phone_number.substring(0, 13));
            Toast.fire({
                icon: 'error',
                title: 'Phone number must be 11 digits'
            });
        }
        if (phone_number.length < 3) {
            $("#phone_number").val('880');
        }
    });
};
validationOfPhone = () => {
    phone_number = $("#phone_number").val();
    if (validatePhone(phone_number)) {
        getPlayerInfo();
    } else {
        Toast.fire({
            icon: 'error',
            title: 'Phone number must be 11 digits'
        });
    }
};

validatePhone = (phone_number) => {
    // bd phone number validation
    var filter = /^8801[1-9]{1}[0-9]{8}$/;
    if (filter.test(phone_number)) {
        return true;
    }
    else {
        return false;
    }
};
getPlayerInfo = () => {
    phone = $('#phone_number').val();
    axios.get(`/report/player/search-by-phone/${phone}`)
        .then(function (response) {
            let { playerInfo, subscription, participate } = response.data.data;
            console.log(playerInfo, subscription);
            setPlayerInfomation(playerInfo);
            setPlayerSubscription(subscription);
            setPlayerParticipate(participate);
        });
}
setPlayerInfomation = (playerInfo) => {
    let player_infomation = '';
    if (playerInfo) {
        player_infomation += `
        <dt class="col-sm-12 text-center">
            <img src="${playerInfo.avatar}" class="w-25 img-fluid" alt="User Image">
            <h3 class="profile-username text-center text-bold">
                Player Avatar
            </h3>
        </dt>
        `;
        player_infomation += `
<dt class="col-sm-4">Phone Number</dt>
<dd class="col-sm-8">${playerInfo.phone}</dd>
`;
        player_infomation += `
<dt class="col-sm-4">Operator</dt>
<dd class="col-sm-8">${playerInfo.operator}</dd>
`;
        let joining_date = new Date(playerInfo.created_at);
        let joining_date_string = joining_date.toDateString();
        player_infomation += `
<dt class="col-sm-4">Joining Date:</dt>
<dd class="col-sm-8">${joining_date_string}</dd>
`;
        $(".player_infomation").html(player_infomation);
    } else {
        // not found
        player_infomation += `
        <dt class="col-sm-12 text-center">
            <h2 class="profile-username text-center text-bold">
                Player's information is not available
            </h2>
        </dt>
        `;
        $(".player_infomation").html(player_infomation);
    }
};
setPlayerSubscription = (subscriptions) => {
    let player_subscribed_tournament = '';
    player_subscribed_tournament += `
<table class="table table-striped" id="player_subscribed_tournament">
    <thead>
        <tr>
            <th>#</th>
            <th>Match Title</th>
            <th>Tournament Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        `;
    // make a loop
    subscriptions.map((subscription, index) => {
        let viewBtn = `<a href="/subscription/1/view/" class="btn btn-outline-info btn-sm">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </a>`;
        if (subscription.match) {
            match_title = subscription.match.title;
            tournament_name = subscription.match.tournament.name;
        } else {
            match_title = "N/A";
            tournament_name = "N/A";
        }
        player_subscribed_tournament += `
        <tr>
            <td>${index + 1}</td>
            <td>${match_title}</td>
            <td>${tournament_name}</td>
            <td>${viewBtn}</td>
        </tr>
        `;
    });
    player_subscribed_tournament += `
    </tbody>
</table>
`;
    $(".player_subscribed_tournament").html(player_subscribed_tournament);
    $('#player_subscribed_tournament').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "autoWidth": false,
        "responsive": true,
    });
    if (subscriptions.length == 0) {
        player_subscribed_tournament = `
        <dt class="col-sm-12 text-center">
            <h2 class="profile-username text-center text-bold">
                There are no subscription for this players.
            </h2>
        </dt>
        `;
        $(".player_subscribed_tournament").html(player_subscribed_tournament);
    }
};
setPlayerParticipate = (participates) => {
    let player_participate_tournament = '';
    player_participate_tournament += `
<table class="table table-striped" id="player_participate_tournament">
    <thead>
        <tr>
            <th>#</th>
            <th>Match Title</th>
            <th>Tournament Name</th>
            <th>Day</th>
            <th>Point</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        `;
    // make a loop
    participates.map((participate, index) => {
        let viewBtn = `<a href="/subscription/1/view/" class="btn btn-outline-info btn-sm">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </a>`;
        if (participate.match) {
            match_title = participate.match.title;
            tournament_name = participate.match.tournament.name;
        } else {
            match_title = "N/A";
            tournament_name = "N/A";
        }
        let day = "Day " + participate.days;
        player_participate_tournament += `
        <tr>
            <td>${index + 1}</td>
            <td>${match_title}</td>
            <td>${tournament_name}</td>
            <td>${day}</td>
            <td>${participate.point}</td>
            <td>${viewBtn}</td>
        </tr>
        `;
    });
    player_participate_tournament += `
    </tbody>
</table>
`;
    $(".player_participate_tournament").html(player_participate_tournament);
    $('#player_participate_tournament').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "autoWidth": false,
        "responsive": true,
    });
    if (participates.length == 0) {
        player_participate_tournament = `
        <dt class="col-sm-12 text-center">
            <h2 class="profile-username text-center text-bold">
                No participate found
            </h2>
        </dt>
        `;
        $(".player_participate_tournament").html(player_participate_tournament);
    }
};
