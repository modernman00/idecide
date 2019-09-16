@extends('layouts.base')

@section('title', 'About us')


@section('content')



<section class="hero is-primary">

    <div class="hero-body">
        <div class="container"></div>
        <h2 class="title is-1">IDecide</h2>
        <h3 class="subtitle">Do you stuggle sometimes to make simple decisions. Our simple to use help me make a decide will guide you</h2>



    </div>



</section>
<br><br>

<div class="columns">

    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">What do you want to buy?</h3>
                <h4 class="subtitle">do you know what?</h4>
                <input class="input" type="text" placeholder="Text input">
            </div>

        </div>



    </div>


    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Purchase</h3>
                <h4 class="subtitle">do you know what?</h4>
                <div class="select">
                    <select>
                        <option>Select dropdown</option>
                        <option>With options</option>
                    </select>
                </div>
            </div>

        </div>



    </div>
    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Purchase</h3>
                <h4 class="subtitle">do you know what?</h4>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="answer">
                        Yes
                    </label>
                    <label class="radio">
                        <input type="radio" name="answer">
                        No
                    </label>
                </div>

            </div>



        </div>



    </div>

    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Purchase</h3>
                <h4 class="subtitle">do you know what?</h4>
            </div>

        </div>



    </div>

</div>

<div class="columns">

    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Purchase</h3>
                <h4 class="subtitle">do you know what?</h4>
            </div>

        </div>



    </div>
    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Purchase</h3>
                <h4 class="subtitle">do you know what?</h4>
            </div>

        </div>



    </div>
    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Purchase</h3>
                <h4 class="subtitle">do you know what?</h4>
            </div>

        </div>



    </div>
    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Purchase</h3>
                <h4 class="subtitle">do you know what?</h4>
            </div>

        </div>



    </div>

</div>

<!-- <div class="columns">

    <div class="column">1</div>
    <div class="column">2</div>
    <div class="column">1</div>
    <div class="column">2</div>

</div> -->

<div class="field">
    <div class="control">
        <label class="checkbox">
            <input type="checkbox">
            I agree to the <a href="#">terms and conditions</a>
        </label>
    </div>
</div>

<div class="field">
    <div class="control">
        <label class="radio">
            <input type="radio" name="question">
            Yes
        </label>
        <label class="radio">
            <input type="radio" name="question">
            No
        </label>
    </div>
</div>

<div class="field is-grouped">
    <div class="control">
        <button class="button is-large is-primary">Submit</button>
    </div>

</div>



@endsection