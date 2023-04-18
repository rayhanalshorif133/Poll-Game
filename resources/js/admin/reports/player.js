var phone_number = "";
var phoneNumberChart = "";
var match_title_chart = "";
var pointChart_bar = "";
var pointChart_line = "";
var colors = ["#4bc0c0", "#3439c7", "#c734bd", "#51546e", "#c73434", "#c7c734", "#34c734", "#ff7b00", "#870e2e"]
var options = {
    scales: {
        y: {
            beginAtZero: true,
            title: {
                display: true,
                text: 'Point'
            }
        },
        x: {
            title: {
                display: true,
                text: 'Day'
            }
        }
    }
};
$(function () {
    $(".reset-btn").click(resetBtnHandler);
    $(".search-btn").click(getPlayerInfo);
    handleSearchField();
    preAssignPointChartBar();
    preAssignPointChartLine();
    $(".searchBtn").on('click', handleSearchBtn);
    $(".resetBtn").on('click', handleChartResetBtn);
    toggleBtnHandler();
});
resetBtnHandler = () => {
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


getPlayerInfo = () => {
    id = $('#phone_number').val();
    axios.get(`/report/player/search-by-phone/${id}`)
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


toggleBtnHandler = () => {
    $(document).on('click', '.toggle', function () {
        $(this).addClass('btn-primary');
        $(this).toggleClass('btn-default');
        if ($(this).hasClass("off")) {
            $(".point_chart_bar").removeClass('d-none');
            $(".point_chart_line").addClass('d-none');
            let randomColor = colors[Math.floor(Math.random() * colors.length)];
            pointChart_bar.data.datasets[0].backgroundColor = randomColor;
            pointChart_bar.data.datasets[0].borderColor = randomColor;
            pointChart_bar.update();
        }
        else {
            $(".point_chart_bar").addClass('d-none');
            $(".point_chart_line").removeClass('d-none');
            let randomColor = colors[Math.floor(Math.random() * colors.length)];
            pointChart_line.data.datasets[0].backgroundColor = randomColor;
            pointChart_line.data.datasets[0].borderColor = randomColor;
            pointChart_line.update();
        }
    });
}


handleChartResetBtn = () => {
    phoneNumberChart.setValue("");
    match_title_chart.setValue("");
    pointChart_bar.data.labels = [];
    pointChart_bar.data.datasets[0].data = [];
    pointChart_bar.update();
    pointChart_line.data.labels = [];
    pointChart_line.data.datasets[0].data = [];
    pointChart_line.update();
}

preAssignPointChartBar = () => {
    const ctx = document.getElementById('point_chart_bar').getContext("2d");
    pointChart_bar = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: '# of Point',
                data: [],
                borderWidth: 1
            }]
        },
        options: options
    });
}

preAssignPointChartLine = () => {
    const ctx = document.getElementById('point_chart_line').getContext("2d");
    let randomColor = colors[Math.floor(Math.random() * colors.length)];
    const data = {
        labels: [],
        datasets: [{
            label: 'Point',
            data: [],
            fill: false,
            borderColor: randomColor,
            tension: 0.1
        }]
    };
    const config = {
        type: 'line',
        data: data,
        options: options
    };
    pointChart_line = new Chart(ctx, config);
}

handleSearchBtn = () => {
    $(".searchBtn").find('i').removeClass('fa-search').addClass('fa-spinner fa-spin');
    let player_id = phoneNumberChart.getValue();
    let match_id = match_title_chart.getValue();
    if (player_id == "" || match_id == "") {
        $(".searchBtn").find('i').removeClass('fa-spinner fa-spin').addClass('fa-search');
        pointChart_bar.data.labels = [];
        pointChart_bar.data.datasets[0].data = [];
        pointChart_bar.update();
        pointChart_line.data.labels = [];
        pointChart_line.data.datasets[0].data = [];
        pointChart_line.update();
        Toast.fire({
            icon: 'error',
            title: 'Please select player and match'
        });
        return;
    }
    axios.get(`/report/player/search/point/${player_id}/${match_id}`)
        .then(response => {
            let data = response.data.data;
            if (data.length == 0) {
                $(".searchBtn").find('i').removeClass('fa-spinner fa-spin').addClass('fa-search');
                Toast.fire({
                    icon: 'error',
                    title: 'No data found'
                });
                return;
            }
            let dayAndPoint = [];
            for (let index = 1; index <= data[0].total_days; index++) {
                dayAndPoint.push({
                    day: index,
                    point: 0
                });
            }
            data.map((item) => {
                dayAndPoint.map((day) => {
                    item.days = parseInt(item.days);
                    if (day.day == item.days) {
                        day.point = item.point;
                    }
                });
            });
            let day = [];
            let points = [];
            dayAndPoint.map((item) => {
                day.push(item.day);
                points.push(item.point);
            });
            pointChart_bar.data.labels = day;
            pointChart_bar.data.datasets[0].data = points;
            pointChart_bar.update();
            pointChart_line.data.labels = day;
            pointChart_line.data.datasets[0].data = points;
            pointChart_line.update();
            setTimeout(() => {
                $(".searchBtn").find('i').removeClass('fa-spinner fa-spin').addClass('fa-search');
            }, 1300);
        });
}

handleSearchField = () => {
    phoneNumber = new TomSelect("#phone_number", {
        persist: false,
        create: false,
        loadingClass: 'loading',
        maxOptions: 20,
        minItems: 1,
        maxItems: 1,
        valueField: 'id',
        labelField: 'phone',
        searchField: ['phone'],
        options: [],
        render: {
            option: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="phone">' +
                    '<span class="label">' +
                    escape(item.phone) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            },
            item: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="phone">' +
                    '<span class="label">' +
                    escape(item.phone) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            }
        },
        load: function (query, callback) {
            if (!query.length) return callback();
            axios.get(`/report/player/search-by-phone-numbers/${query}`)
                .then(function (response) {
                    callback(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
    phoneNumberChart = new TomSelect("#search-phone-number-chart", {
        persist: false,
        create: false,
        loadingClass: 'loading',
        maxOptions: 20,
        minItems: 1,
        maxItems: 1,
        valueField: 'id',
        labelField: 'phone',
        searchField: ['phone'],
        options: [],
        render: {
            option: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="phone">' +
                    '<span class="label">' +
                    escape(item.phone) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            },
            item: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="phone">' +
                    '<span class="label">' +
                    escape(item.phone) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            }
        },
        load: function (query, callback) {
            if (!query.length) return callback();
            axios.get(`/report/player/search-by-phone-numbers/${query}`)
                .then(function (response) {
                    callback(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
    match_title_chart = new TomSelect("#match_title_chart", {
        persist: false,
        create: false,
        loadingClass: 'loading',
        maxOptions: 20,
        minItems: 1,
        maxItems: 1,
        valueField: 'id',
        labelField: 'title',
        searchField: ['title'],
        options: [],
        render: {
            option: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="title">' +
                    '<span class="label">' +
                    escape(item.title) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            },
            item: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="title">' +
                    '<span class="label">' +
                    escape(item.title) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            }
        },
        load: function (query, callback) {
            if (!query.length) return callback();
            axios.get(`/report/player/search-by-match-title/${query}`)
                .then(function (response) {
                    callback(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
}





































































































