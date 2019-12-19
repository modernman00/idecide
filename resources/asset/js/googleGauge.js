
const totalScore = parseInt(document.getElementById('totalScore').value);


google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['Decision', totalScore]

    ]);

    var options = {
      width: 900, height: 500,
      redFrom: 0, redTo: 60,
      yellowFrom:60, yellowTo: 85,
      greenFrom:85, greenTo: 100,
      minorTicks: 5
    };

    var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

    chart.draw(data, options);

  }

  