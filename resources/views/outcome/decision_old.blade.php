@extends('layouts.baseGauge_bootstrap')

@section('title', 'Decision Matrix')


@section('content')

<h1 style="text-align:center"> Decision Page</h1>

@isset($pullData)
    @foreach ($pullData as $data)        
    @endforeach
    
@endisset

<input type="hidden" name="totalScore" id="totalScore" value="{{ $data['totalScore'] }}">


<div class="row">

    <div class="col-sm-6">

        <div id="chart_div" style="width: 400px; height: 520px;">
        </div>
    </div>

    <div class="col-sm-6">

        @if ($data['totalScore'] > 85)
            Please, buy the  {{ $data['requirement'] }}

        @elseif($data['totalScore'] > 65 && $data['totalScore'] < 85 )
            <h2>Please, have a rethink about buying the  {{ $data['requirement'] }}, and these are the areas we think you should consider</h2>
            <ul>
                
                    @if($data['reward'] < 5) 

                       <li> You should consider if this purchase will truly make you happy in the long run
                       </li>
                    @elseif($data['incomeSource'] < 5)
                       
                    <li> You should consider if this purchase will truly make you happy in the long run
                        </li>
                    
                    @elseif($data['affordability'] < 5)

                    <li> You should consider your finances again. Can you truly afford this purchase?
                        </li>
                    
                    @endif
              
            </ul>
        @else
            <li>Based on your response, we will advise you against making the purchase. Please see areas of concerns below: </li>
            
        @endif


    </div>


</div>

<hr>

   

<script>

    const totalScore = parseInt(document.getElementById('totalScore').value);


    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Decision', totalScore]
    
        ]);

        var options = {
     
         // width: 900, height: 500,
          redFrom: 0, redTo: 60,
          yellowFrom:60, yellowTo: 85,
          greenFrom:85, greenTo: 100,
          minorTicks: 5,
          animation: {startup: true, duration: 1000,
        easing: 'out',
        vAxis: {minValue:0, maxValue:100}

 },
          forceIframe: true
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

      }

      


</script>

@endsection