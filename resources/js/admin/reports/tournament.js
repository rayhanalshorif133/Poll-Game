
var selectTournament = '';
var selectMatch = '';
var matchId = '';
var tournamentId = '';
$(function () {
    handleSearchAbleFields();
    $(".search-btn").click(getInformation);
});




getInformation = () => {
    tournamentId = selectTournament.getValue();
    matchId = selectMatch.getValue();
    if (tournamentId && matchId) {
        poll_infomation(tournamentId, matchId);
    }
};

poll_infomation = (tournamentId, matchId) => {
    axios.get(`/report/tournament/fetch-poll-info/${tournamentId}/${matchId}`)
        .then(function (response) {
            setPollInfo(response.data.data);
        })
        .catch(function (error) {
            console.log(error);
        });
};




setPollInfo = (data) => {
    console.log(data);
    if (data) {
        let total_days = data.match ? data.match.total_days : 0;
        let pollInfo = data.pollInfo ? data.pollInfo : [];
        let pollDay = data.match ? data.match.poll_day : 0;

        let html = '';
        html += `<div class=""><b>Match Durations:</b> ${total_days} days</div>`;
        html += `<div class=""><b>Current Poll Day:</b> ${pollDay} day</div>`;
        html += `<div class=""><b>Poll Information:</b></div>`;

        if (pollInfo.length == 0) {
            html += `<div class="">
                        <b>Poll Info:</b> No Polls Found
                        </div>`;
        } else {
            html += `<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Count of Poll</th>
                                </tr>
                            </thead>
                            <tbody>`;
            for (let day = 1; day <= total_days; day++) {

                let pollCount = 0;
                for (let i = 0; i < pollInfo.length; i++) {
                    if (pollInfo[i].day == day) {
                        pollCount++;
                    }
                }

                html += `<tr>
                            <td>${day}</td>
                            <td>${pollCount}</td>
                        </tr>`;

            }
            html += `</tbody>
                    </table>
                </div>`;
        }
        console.log(pollInfo);

        $(".poll_infomation").html(html);

    }
};


handleSearchAbleFields = () => {
    selectTournament = new TomSelect("#tournament", {
        persist: false,
        create: false,
        loadingClass: 'loading',
        maxOptions: 20,
        minItems: 1,
        maxItems: 1,
        valueField: 'id',
        labelField: 'name',
        searchField: ['name'],
        options: [],
        render: {
            option: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="name">' +
                    '<span class="label">' +
                    escape(item.name) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            },
            item: function (item, escape) {
                return (
                    '<div>' +
                    '<span class="name">' +
                    '<span class="label">' +
                    escape(item.name) +
                    '</span>' +
                    '</span>' +
                    '</div>'
                );
            }
        },
        load: function (query, callback) {
            if (!query.length) return callback();
            axios.get(`/report/tournament/fetch-by-name/${query}`)
                .then(function (response) {
                    callback(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });


    selectTournament.on('change', function () {
        tournamentId = selectTournament.getValue();
    });


    selectMatch = new TomSelect("#match", {
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
            axios.get(`/report/player/search-by-match-title/${query}/${tournamentId}`)
                .then(function (response) {
                    callback(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
}
