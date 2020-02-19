@extends('layouts.baseGauge_bootstrap')

@section('title', 'Decision Matrix')


@section('content')

<style>

  
.decide_me {
  // background-image: url('/img/decisionHomePage.jpg');
  // height: 95vh;
  // background-size: cover;
  // background-position: center;

}
</style>

{{-- 
<div class="decide_me">


  <hr>
</div> --}}


@isset($categories)
    @foreach ($categories as $category)        
    @endforeach
    
@endisset

@isset($pullData)
    @foreach ($pullData as $data)        
    @endforeach
    
@endisset



<input type="hidden" name="totalScore" id="totalScore" value="{{ $data['totalScore'] }}">

<input type="hidden" name="financeCat" id="financeCat" value="{{ $category['finance'] }}">

<input type="hidden" name="purposeCat" id="purposeCat" value="{{ $category['purpose'] }}">

<div class="container-fluid">
<div class="row">

 
    {{-- {{ --ALGORITHMFORTHEMAINDECISION-- }} --}}
    <div class="decide_me">  
      
      <h1 class="text-center"> DECISION PAGE</h1>
      <br>
     {{-- THE DECISION GRAPH --}}

    <div class="col-sm-6">

        <div style="width: 200px; height: 320px;">

          <div id="main"></div>
   
        </div>
    </div>
    <div class="col-sm-6 showDecision">
        @if ($data['totalScore'] > 85)
           <h4 class="text-white">
             <h4>
              <i class="fas fa-check"></i><i> Good News! Based strictly on the information you provided, iDecide believes that you could consider buying the  {{ $data['purchase'] }}.</i> 
           </h4>
          @elseif($data['totalScore'] > 65 && $data['totalScore'] < 85 )
            <div class="text-white ">
                <h4 class="bg-warning py-4 px-4"><i class="fas fa-exclamation"></i>Please, have a re-think about buying the  {{ $data['purchase'] }}. These are the areas we think you should consider before making the final decision:</h4>            
                  <ul class="text-muted">               
                        @if($data['reward'] < 4) 
                          <li> <i>You should consider if buying the  {{ $data['purchase'] }} will truly make you happy in the long run </i></li>
                        @endif 
                        @if($data['finance'] < 5)                       
                          <li class='mr-1'><i> We think you should re-consider how you intend to pay for the {{ $data['purchase'] }}. Give this a second thought </i></li> 
                        @endif                   
                        @if($data['affordability'] < 5)
                          <li> We think this will be an affordability issue so it is something to consider</li>                    
                        @endif              
                  </ul>
            </div>
          @else
          <div class="text-white">
            <h4 class="bg-danger py-4 px-4"><i class="fas fa-ban"></i></i><i>Based on your response, we will advise you against buying the {{ $data['purchase'] }} .  Please see areas of concerns below</i> </h4>        
                  <ul class="text-muted">               
                        @if($data['reward'] < 4) 
                          <li> <i>You should consider if this purchase will truly make you happy in the long run </i></li>
                        @endif   
                        @if($data['finance'] < 4)                       
                          <li class='mr-1'><i> We think you should re-consider how you intend to pay for the {{ $data['purchase'] }}. Give this a second thought </i></li> 
                        @endif                      
                        @if($data['affordability'] < 4)
                          <li><i>We believe there will be an affordability issue so it is something to consider</i> </li>                    
                        @endif              
                  </ul>
          </div>            
        @endif
    </div>
    </div>

</div>

<hr>

{{-- GRAPH BREAKDOWN IN CATEGORY --}}
  <div class="row ">

    {{-- FINANCE --}}

    <div class="col-sm-6 text-center breakdown">

      <h3 class="catTitle "> Financial Position</h3>

        <div id="financeChart"></div>

    </div>

    <hr>

    <div class="col-sm-6 text-center breakdown ">
      <h3 class="catTitle "> Purpose</h3>
      <div id="purposeChart"></div>

    </div>

    {{-- <div class="col-sm-6 text-center">
      <h3 class="catTitle"> Concern</h3>
      <div id="concernChart"></div>

    </div> --}}



  </div>


@endsection