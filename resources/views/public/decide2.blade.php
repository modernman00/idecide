@extends('layouts.base')

@section('title', 'Decision Matrix')


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
<br>

<section class="section">
    <div class="container">

        <form action="/submit" method="post">

            <!-- INITIAL NECESSITY, FULFILMENT, OPTIONS, AFFORDABILITY-->

            <div class="columns">

                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">PURCHASE</h3>
                            <h4 class="subtitle">What do you want to buy?</h4>
                            <input class="input" type="text" placeholder="Text input" name="requirement" id="requirement">
                        </div>

                    </div>



                </div>

                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">PURPOSE</h3>
                            <h4 class="subtitle">Why do you need it?</h4> <input class="input" type="text" placeholder="Text input" name="time">
                        </div>

                    </div>



                </div>
                <!-- 
                        <div class="column">
                            <div class="card">
                                <div class="card-content">
                                    <h3 class="title">Gender</h3>
                                    <h4 class="subtitle">Gender?</h4>
                                    <div class="select">
                                        <select name="gender">
                                            <option>Select dropdown</option>
                                            <option>Female</option>
                                            <option>Male</option>

                                        </select>
                                    </div>
                                </div>

                            </div>



                        </div> -->



                            <!-- <div class="column">
                            <div class="card">
                                <div class="card-content">
                                    <h3 class="title">Desire</h3>
                                    <h4 class="subtitle">How long have you been thinking about it?</h4>
                                    <div class="select">
                                        <select name="time">
                                            <option>Select dropdown</option>
                                            <option>Just now</option>
                                            <option>One month</option>
                                            <option>Two Months</option>
                                            <option>Three Months Plus</option>
                                        </select>
                                    </div>
                                </div>

                            </div>



                        </div> -->

                            <!-- <div class="column">
                            <div class="card">
                                <div class="card-content">
                                    <h3 class="title">Cost</h3>
                                    <h4 class="subtitle">What will it cost?</h4>
                                    <div class="control">
                                        <input class="input" type="number" placeholder="Text input" id="cost" name="cost">
                                    </div>

                                </div>

                            </div>

                        </div> -->

                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">Finance</h3>
                            <h4 class="subtitle">Where would you source the money from?</h4>

                            <div class="select">
                                <select name="incomeSource">
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

            <!-- OPTIONS, FULILMENTS AND NECESSITY -->
            <div class="columns">

                <!-- NECESSITY -->
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">Necessity</h3>
                            <h4 class="subtitle"> Is this a "Need - necessary" or a "Want - nice to have"?</h4>

                            <div class="select">
                                <select name="needWant">
                                    <option>Select dropdown</option>
                                    <option>Necessary - I really need it/option>
                                    <option>I love and want it</option>
                                    <option>Just something nice to have</option>
                                    <option>Hmmm, not a need or want - just feel like spending</option>
                                </select>
                            </div>
                        </div>

                    </div>



                </div>
                <!-- FULFILMENT -->
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">REWARD</h3>
                            <h4 class="subtitle">if you bought it, how would it make you feel?</h4>

                            <div class="select">
                                <select name="reward">
                                    <option>Select dropdown</option>
                                    <option>Very happy even if bought with loan/credit</option>
                                    <option>It will surely add to my self esteem</option>
                                    <option>I think it should make me happy</option>
                                    <option>Makes me feel relevant</option>
                                    <option>Happy at first, but may later regret buying it</option>
                                    <option>It won't make a difference to how I feel</option>
                                </select>
                            </div>
                        </div>

                    </div>



                </div>
                <!-- OPTIONS -->
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">OTHER OPTIONS</h3>
                            <h4 class="subtitle">Have you considered other options or alternatives?</h4>

                            <div class="select">
                                <select name="otherOptions">
                                    <option>Select dropdown</option>
                                    <option>Yes, and am convinced this is what I want</option>
                                    <option>No, I have not really thought about other options</option>
                                    <option>I don't look at other options. Am clear this is what I want.</option>

                                </select>
                            </div>
                        </div>

                    </div>



                </div>


            </div>

            <!-- FINANCES -->

            <div class="columns">
                <!-- AFFORDABILITY -->
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">AFFORDABILITY</h3>
                            <h4 class="subtitle">Can you afford it without stretching your finance?</h4>

                            <div class="select">
                                <select name="affordability">
                                    <option>Select dropdown</option>
                                    <option>Yes! I can afford without over reaching</option>
                                    <option>I may need to my expenses in other areas</option>
                                    <option>Makes no difference because someone else is paying</option>
                                    <option>Big risk to my finance but I think it will be fine</option>
                                </select>
                            </div>
                        </div>

                    </div>



                </div>

                <!-- CONCERNS -->

                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">CONCERNS</h3>
                            <h4 class="subtitle">Would you say there are concerns about your debt level/expenses/job/income?</h4>

                            <div class="select">
                                <select name="concerns">
                                    <option>Select dropdown</option>
                                    <option>Income is fine and expenses and debt level are quite low </option>
                                    <option>Am concern but this purchase shouldn't make a difference</option>
                                    <option>I have serious concerns</option>

                                </select>
                            </div>
                        </div>

                    </div>



                </div>

                <!-- MEANS TO AN END -->

                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title">IS NOT RATIONAL</h3>
                            <h4 class="subtitle">Sometimes, purchase could be an investment in one's goal and self esteem?</h4>

                            <div class="select">
                                <select name="isNotRational">
                                    <option>Select dropdown</option>
                                    <option>Absolutely, it will boost my confidence and motivation</option>
                                    <option>I may need cut my expenses in other areas</option>
                                    <option>Makes no difference because someone else is paying</option>
                                    <option>Big risk to my finance but I think it will be fine</option>
                                </select>
                            </div>
                        </div>

                    </div>



                </div>

            </div>


            <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox">
                        I agree to the <a href="#">terms and conditions</a>
                    </label>
                </div>
            </div>

            <!-- <div class="field">
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
            </div> -->

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-large is-primary">Submit</button>
                </div>

            </div>


        </form>
    </div>
</section>

@endsection