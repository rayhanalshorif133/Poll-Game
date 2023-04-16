const { split } = require("lodash");

selectTournament = '';
selectMatch = '';
$(function () {
    handleSearchAbleFields();
    time();
    $(".search-btn").click(getInformation);
});

time = () => {
    time = moment().format('LT');
    time = time.split(" ")[0].split(":")[1];
    time = 60 - parseInt(time);
    let seconds = time * 60;
    let interval = setInterval(function () {
        let minutes = Math.floor(seconds / 60);
        let remSeconds = seconds % 60;
        let time = minutes + ":" + remSeconds;
        $("#time").text(time);
        seconds--;
        if (seconds < 0) {
            clearInterval(interval);
            $("#time").text("Time Out");
        }
    }, 1000);

};



getInformation = () => {
    let tournamentId = selectTournament.getValue();
    let matchId = selectMatch.getValue();

    console.log(tournamentId, matchId);
    if (tournamentId && matchId) {
        poll_infomation(tournamentId, matchId);
    }
};

poll_infomation = (tournamentId, matchId) => {
    axios.get(`/report/tournament/fetch-poll-info/${tournamentId}/${matchId}`)
        .then(function (response) {
            console.log(response.data.data);
        })
        .catch(function (error) {
            console.log(error);
        });
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
