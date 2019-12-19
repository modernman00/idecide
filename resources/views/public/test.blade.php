@extends('layouts.base')

@section('title', 'Help me decide')


@section('content')



<section class="hero is-primary">

    <div class="hero-body">
        <div class="container"></div>
        <h2 class="title is-1">IDecide</h2>

        @foreach ($info as $info )

            <?php  var_dump($info) ?>
            
        @endforeach
       



    </div>



</section>




@endsection -->