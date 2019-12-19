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

        {{--  <div id="chart_div" style="width: 400px; height: 520px;">
        </div>  --}}
        <div style="width: 500px; height: 620px;"><div id="gaugeArea2"></div>
   
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

<a href="http://recogizer.com/en">
    <div class="header">
      <img src="logo-recogizer.jpg" />
      <div class="subheader">_open_source</div>
    </div>
  </a>
  <div class="gauge-row">
    <div><div id="gaugeArea1"></div><div class="edit" onclick="edit(1)">edit</div></div>
    {{--  <div><div id="gaugeArea2"></div><div class="edit" onclick="edit(2)">edit</div></div>  --}}
    <div><div id="gaugeArea3"></div><div class="edit" onclick="edit(3)">edit</div></div>
    <div><div id="gaugeArea4"></div><div class="edit" onclick="edit(4)">edit</div></div>
  </div>

  <footer>© 2018 RECOGIZER GROUP GmbH - All Rights Reserved.</footer>
  <script src="https://unpkg.com/gauge-chart@0.5.1/dist/bundle.js"></script>
  <script>
          const totalScore = parseInt(document.getElementById('totalScore').value);

    // Element inside which you want to see the chart.
    let element1 = document.querySelector('#gaugeArea1')
	  let element2 = document.querySelector('#gaugeArea2')
	  let element3 = document.querySelector('#gaugeArea3')
    let element4 = document.querySelector('#gaugeArea4')
  
    let options1 = {
      arcColors: ['rgb(44, 151, 222)', 'lightgray'],
      arcDelimiters: [80],
      rangeLabel: ['0%', '100%'],
      centralLabel: '70%',
    }
  
    let options2 = {
      hasNeedle: true,
	    needleColor: 'black',
      arcColors: ['rgb(255, 84, 84)', 'rgb(239, 214, 19)', 'rgb(61, 204, 91)'],
      arcDelimiters: [50, 85, 99.99],
      arcLabels: ["DON'T BUY", 'RECONSIDER', 'BUY'],
      arcPadding: 6,
      arcPaddingColor: 'white',
      rangeLabel: ['0', '100'],
      needleStartValue: 0,
    }
  
	let options3 = {
	    hasNeedle: true,
	    outerNeedle: true,
	    needleColor: 'rgb(166, 206, 227)',
        arcDelimiters: [],
        rangeLabel: ['-10', '10'],
	    centralLabel: '2',
	    rangeLabelFontSize: 42,
    }
    // let zebraArcDelimiters = []
    // let zebraArcColors = []
    // zebraArcColors.push('black')
    // for (let i = 2; i < 100; i = i + 2) {
    //   zebraArcDelimiters.push(i)
    //   i % 4 ? zebraArcColors.push('white') : zebraArcColors.push('black')
    // }
    // zebraArcColors.push('black')
  
	  // let options4 = {
	  //   hasNeedle: true,
	  //   needleColor: 'black',
    //   arcDelimiters: zebraArcDelimiters,
    //   arcColors: zebraArcColors,
    //   centralLabel: 'zebra',
    // }  
	let options5 = {
	    hasNeedle: true,
	    needleColor: 'black',
      arcColors: [],
      arcDelimiters: [10, 60, 90],
      arcPadding: 6,
      arcPaddingColor: 'white',
      arcLabels: ['NO', 'Think again', 'Buy'],
      arcLabelFontSize: false,
      //arcOverEffect: false,
      // label options
      rangeLabel: ['0', '350'],
      centralLabel: '175',
      rangeLabelFontSize: false,
      labelsFont: 'Consolas',
    }
    // Drawing and updating the chart.  
    GaugeChart
      .gaugeChart(element1, 400, options1)
      .updateNeedle(70)
  
	  GaugeChart
      .gaugeChart(element2, 400, options2)
      .updateNeedle(totalScore)
  
	  GaugeChart
      .gaugeChart(element3, 400, options3)
      .updateNeedle(60)
  
	  GaugeChart
      .gaugeChart(element4, 400, options5)
      .updateNeedle(30)
        function edit(id) {
            params = objToUrlStr(id)
            window.open('edit.html?' + params)
        }
    function objToUrlStr(id) {
      let options = {}
      if (id === 1)
        options = options1
      else if (id === 2)
        options = options2
      else if (id === 3)
        options = options3
      else if (id === 4)
        options = options4
      // stringify Object and delete all spaces from it
      return JSON.stringify(options).replace(/\s/g, '')
    }
  </script>

  <a href="https://github.com/recogizer">
    <img class="fork-me" alt="Fork me on GitHub" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png">
  </a>

@endsection