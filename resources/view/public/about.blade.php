@extends('layouts.base')

@section('title', 'Help me decide')


@section('content')



<section class="hero is-primary">

    <div class="hero-body">
        <div class="container"></div>
        <h2 class="title is-1">IDecide</h2>
        <h3>
            Every purchase satisfies either a need or want and most times we are conflicted on whether to spend on something we desire or not

            Especially in this modern world, where we are bombarded with advertisements on the latest items/products/services. With all, trying to convince us to spare our pennies, and the reality is that, it is difficult not be influenced by this desire to buy, sometimes, things we don't need, or even want. Thus, creating attractions for so many " nice to have stuff".

            Our app is created to guide you in making fair and rational decisions when conflicted on whether to make a purchase or not. Using our simple list of questions can help you to make smarter buying decisions in all areas of your expenditures.
        </h3>
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
                <h3 class="title">Desire</h3>
                <h4 class="subtitle">How long have you been thinking about it?</h4>
                <div class="select">
                    <select>
                        <option>Select dropdown</option>
                        <option>Just now</option>
                        <option>One month</option>
                        <option>Two Months</option>
                        <option>Three Months Plus</option>
                    </select>
                </div>
            </div>

        </div>



    </div>

    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Cost</h3>
                <h4 class="subtitle">What will it cost?</h4>
                <div class="control">
                    <input class="input" type="number" placeholder="Text input">
                </div>

            </div>



        </div>



    </div>

    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Finance</h3>
                <h4 class="subtitle">Where would you source the money from?</h4>

                <div class="select">
                    <select>
                        <option>Select dropdown</option>
                        <option>Savings</option>
                        <option>Salary/Income</option>
                        <option>Free Cash</option>
                        <option>Credit Card</option>
                        <option>Gift</option>
                        <option>Loan</option>
                        <option>Monthly Repayment</option>
                    </select>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="columns">

    <div class="column">
        <div class="card">
            <div class="card-content">
                <h3 class="title">Need Or Want</h3>
                <h4 class="subtitle"> Is this a "Need - necessary" or a "Want - nice to have"?</h4>

                <div class="select">
                    <select>
                        <option>Select dropdown</option>
                        <option>Just now</option>
                        <option>One month</option>
                        <option>Two Months</option>
                        <option>Three Months Plus</option>
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
<!-- 
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



@endsection -->