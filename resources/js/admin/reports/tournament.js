var selectTournament = '';
var selectMatch = '';
var matchId = '';
var tournamentId = '';
var loader = `
<div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
    <div class="bounce4"></div>
    <div class="bounce5"></div>
</div>
`;
$(function () {
    handleSearchAbleFields();
    $(".search-btn").click(getInformation);
    $(".reset-btn").click(informationReset);
});


informationReset = () => {
    selectTournament.clear();
    selectMatch.clear();
    $(".poll_infomation").html(loader);
    $(".submitted_poll_measurement").html(loader);
    $(".submitted_poll_measurement_chart_view").html(loader);
};


getInformation = () => {
    tournamentId = selectTournament.getValue();
    matchId = selectMatch.getValue();

    tournamentId = 1;
    matchId = 1;

    if (tournamentId && matchId) {
        poll_infomation(tournamentId, matchId);
    }
};

poll_infomation = (tournamentId, matchId) => {
    axios.get(`/report/tournament/fetch-poll-info/${tournamentId}/${matchId}`)
        .then(function (response) {
            setPollInfo(response.data.data);
            setSubmittedPollMeasurementInfo(response.data.data);
            setSubPollMeasInfoChartView(response.data.data);
        })
        .catch(function (error) {
            console.log(error);
        });
};

setSubPollMeasInfoChartView = (getData) => {
    $(".submitted_poll_measurement_chart_view").html(`<canvas id="poll_measurement_chart_view"></canvas>`);

    let labels = [];
    let submittedPoll = [];
    let submitted = [];
    let correct = [];
    let wrong = [];



    for (let day = 1; day <= getData.match.total_days; day++) {
        let pollCount = 0;
        let correctPollCount = 0;
        let wrongPollCount = 0;

        getData.score.map(function (item) {
            if (item.day == day) {
                pollCount++;
                if (item.answer_status == "correct") {
                    correctPollCount++;
                }
                else {
                    wrongPollCount++;
                }
            }
        });

        submittedPoll.push({
            day: day,
            submitted: pollCount,
            correct: correctPollCount,
            wrong: wrongPollCount
        });

    }



    submittedPoll.map(function (item) {
        labels.push(item.day);
        submitted.push(item.submitted);
        correct.push(item.correct);
        wrong.push(item.wrong);
    });

    const ctx = $('#poll_measurement_chart_view');

    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Submitted Poll',
                data: submitted,
                borderColor: '#9059FF',
                backgroundColor: '#E6D9FF',
                borderWidth: 1
            },
            {
                label: 'Correct Poll',
                data: correct,
                borderColor: '#198754',
                backgroundColor: '#D3F5F5',
                borderWidth: 1
            },
            {
                label: 'Wrong Poll',
                data: wrong,
                borderColor: '#FF6D8D',
                backgroundColor: '#FFD9E1',
                borderWidth: 1
            },

        ]
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
    });
};

setSubmittedPollMeasurementInfo = (data) => {
    let html = '';
    if (data) {
        let total_submitted_poll = data.score ? data.score.length : 0;
        html += `<div class=""><b>Total Submitted:</b> ${total_submitted_poll}</div>`;

        if (total_submitted_poll == 0) {
            html += `<div class=" mt-3">
                        <b>Submitted Poll Info:</b> No Polls Found
                        </div>`;
        }
        else {
            html += `<div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Submitted</th>
                                    <th>Correct</th>
                                    <th>Wrong</th>
                                </tr>
                            </thead>
                            <tbody>`;
            for (let day = 1; day <= data.match.total_days; day++) {
                let pollCount = 0;
                let correctPollCount = 0;
                let wrongPollCount = 0;

                data.score.map(function (item) {
                    if (item.day == day) {
                        pollCount++;
                        if (item.answer_status == "correct") {
                            correctPollCount++;
                        }
                        else {
                            wrongPollCount++;
                        }
                    }
                });


                html += `<tr>
                            <td>${day}</td>
                            <td>${pollCount}</td>
                            <td>${correctPollCount}</td>
                            <td>${wrongPollCount}</td>
                        </tr>`;

            }
            html += `</tbody>
                    </table>
                </div>`;
        }

        $(".submitted_poll_measurement").html(html);
    }
};


setPollInfo = (data) => {

    if (data) {
        let total_days = data.match ? data.match.total_days : 0;
        let pollInfo = data.pollInfo ? data.pollInfo : [];
        let pollDay = data.match ? data.match.poll_day : 0;

        let html = '';
        html += `<div class=""><b>Match Durations:</b> ${total_days} days</div>`;
        html += `<div class=""><b>Current Poll Day:</b> ${pollDay} day</div>`;
        html += `<div class=""><b>Total Poll:</b> ${pollInfo.length}</div>`;

        if (pollInfo.length == 0) {
            html += `<div class=" mt-3">
                        <b>Poll Info:</b> No Polls Found
                        </div>`;
        } else {
            html += `<div class="table-responsive mt-3">
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
