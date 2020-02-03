@extends('layouts.baseGauge_bootstrap')

@section('title', 'Decision Matrix')


@section('content')

<h1 style="text-align:center; color:black;"> DECISION PAGE</h1>
<br>
<hr>

@isset($categories)
    @foreach ($categories as $cat)        
    @endforeach
    
@endisset

@isset($pullData)
    @foreach ($pullData as $data)        
    @endforeach
    
@endisset



<input type="hidden" name="totalScore" id="totalScore" value="{{ $data['totalScore'] }}">

<input type="hidden" name="financeCat" id="financeCat" value="{{ $cat['finance'] }}">

<input type="hidden" name="purposeCat" id="purposeCat" value="{{ $cat['purpose'] }}">


<div class="row">

     {{-- THE DECISION GRAPH --}}

    <div class="col-sm-6">

        <div style="width: 200px; height: 320px;">

          <div id="main"></div>
   
        </div>
    </div>

    {{-- {{ --ALGORITHMFORTHEMAINDECISION-- }} --}}

    <div class="col-sm-6" style="background-color: #D11206; color:white;";>

  

        @if ($data['totalScore'] > 85)
           <h3>
             <i> Good News! Based strictly on the information you provided, iDecide believes that buying the  {{ $data['requirement'] }} is a good decision.</i> 
           </h3>

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

{{-- GRAPH BREAKDOWN IN CATEGORY --}}
  <div class="row">

    {{-- FINANCE --}}

    <div class="col-sm-4">

      <h3 class="catTitle"> Financial Position</h3>

        <div id="gaugeArea4"></div>

    </div>

    <div class="col-sm-4">
      <h3 class="catTitle"> Purpose</h3>
      <div id="gaugeArea5"></div>

    </div>

    <div class="col-sm-4">
      <h3 class="catTitle"> Concern</h3>
      <div id="gaugeArea6"></div>

    </div>



  </div>


@endsection