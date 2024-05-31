var dates = [];
var sleep = [];
var tired = [];
var drink = [];
var hangover = [];

for (var i = 0; i < diaryData.length; i++) {
    dates.push(diaryData[i].created_at);
    sleep.push(diaryData[i].sleep);
    tired.push(diaryData[i].tired);
    drink.push(diaryData[i].drink);
    hangover.push(diaryData[i].hangover);
}

var ctx = document.getElementById("myLineChart").getContext('2d');
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dates,
        datasets: [
            {
                label: '睡眠',
                data: sleep,
                borderColor: "rgba(255,0,0,1)",
                backgroundColor: "rgba(0,0,0,0)"
            },
            {
                label: '疲労',
                data: tired,
                borderColor: "rgba(0,255,0,1)",
                backgroundColor: "rgba(0,0,0,0)"
            },
            {
                label: '飲酒量',
                data: drink,
                borderColor: "rgba(0,0,255,1)",
                backgroundColor: "rgba(0,0,0,0)"
            },
            {
                label: '二日酔い',
                data: hangover,
                borderColor: "rgba(255,255,0,1)",
                backgroundColor: "rgba(0,0,0,0)"
            },
        ]
    },
    options: {
        title: {
            display: true,
            text: '記録（日付）'
        },
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMax: 5.1,
                    suggestedMin: 0,
                    stepSize: 1,
                    callback: function(value, index, values){
                        return  value;
                    }
                }
            }]
        },
    }
});


$(document).ready(function() {

    function toggleSidebar() {
        $(".button").toggleClass("active");
        $("main").toggleClass("move-to-left");
        $(".sidebar-item").toggleClass("active");
    }

    $(".button").on("click tap", function() {
        toggleSidebar();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
        toggleSidebar();
        }
    });

});