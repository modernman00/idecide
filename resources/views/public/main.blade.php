@extends('layouts.base_bootstrap')

@section('title', 'Decision Matrix')


@section('content')

<form action="/main" method="POST">

    <div class="notification"></div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/dad.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">PURCHASE</h5>
                            <p class="card-text">What do you want to buy? This could be anything.</p>
                            <input class="form-control" type="text" placeholder="Text input" name="requirement" id="requirement">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/bg_home1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">PURPOSE</h5>
                            <p class="card-text">Why do you need/want it?Think carefully about this question.</p>
                            <div >
                                <input class="form-control" type="text" placeholder="Text input" name="purpose" id="purpose">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/bg_home1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">FINANCE</h5>
                            <p class="card-text">How do you intend to source the money to buy this item.</p>
                            <div >
                                <select name="incomeSource" class="form-control" id="incomeSource">
                                    <option value="">Select dropdown</option>
                                    <option value=5>Savings</option>
                                    <option value=5>Salary/Income</option>
                                    <option value=5>Free Cash</option>
                                    <option value=2>Credit Card</option>
                                    <option value=5>Gift</option>
                                    <option value=3>Loan</option>
                                    <option value=3>Monthly Repayment</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OPTIONS, FULILMENTS AND NECESSITY -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/dad.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">NECESSITY</h5>
                            <p class="card-text">Is this a "Need - necessary" or a "Want - nice to have"?</p>
                            <div class="select">
                                <select name="needWant">
                                    <option>Select dropdown</option>
                                    <option value= 5>Necessary - I really need it/option>
                                    <option value= 4>I love and want it</option>
                                    <option value= 3>Just something nice to have</option>
                                    <option value= 2>Hmmm, not a need or want - just feel like spending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/bg_home1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">REWARD</h5>
                            <p class="card-text">If you bought it, how will make you feel?</p>
                            <div class="select">
                                <select name="reward" id="reward">
                                    <option>Select dropdown</option>
                                    <option value=5>Very happy even if bought with loan/credit</option>
                                    <option value=5>It will surely add to my self esteem</option>
                                    <option value=3>I think it should make me happy</option>
                                    <option value=2>Makes me feel relevant</option>
                                    <option value=1>Happy at first, but may later regret buying it</option>
                                    <option value=1>It won't make a difference to how I feel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/bg_home1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">OTHER OPTIONS</h5>
                            <p class="card-text">Have you considered other options or alternatives?</p>
                            <div class="select">
                                <select name="otherOptions" id="otherOptions">
                                    <option>Select dropdown</option>
                                    <option value=5>Yes, and am convinced this is what I want</option>
                                    <option value=2>No, I have not really thought about other options</option>
                                    <option value=3>I don't need to look at other options. Am clear this is what I want.</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FINANCES -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/dad.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">AFFORDABILITY</h5>
                            <p class="card-text">Can you afford it without stretching your finance?</p>
                            <div class="select">
                                <select name="affordability" id="affordability">
                                    <option>Select dropdown</option>
                                    <option value=5>Yes! I can afford without over reaching</option>
                                    <option value=3>I may need to cut my expenses in other areas</option>
                                    <option value=5>Makes no difference because someone else is paying</option>
                                    <option value=1>Big risk to my finance but I think it will be fine</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- CONCERNS -->
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/bg_home1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">CONCERNS</h5>
                            <p class="card-text">Are their concerns about your debt level/expenses/job/income?</p>
                            <div class="select">
                                <select name="concerns" id="concerns">
                                    <option>Select dropdown</option>
                                    <option value=5>Income is robust</option>
                                    <option value=4> Expenses and debt level are quite low </option>
                                    <option value=3>Am concern but this purchase shouldn't make a difference</option>
                                    <option value=1>I have serious concerns</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MEANS TO AN END -->
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/bg_home1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">UNQUANTIFIABLE BENEFIT</h5>
                            <p class="card-text">Sometimes, purchase could be an investment in one's goal and self esteem?</p>
                        
                            <div class="select">
                                <select name="isNotRational" id="isNotRational">
                                    <option>Select dropdown</option>
                                    <option value=5>Yes, I will spur me onto greater things</option>
                                    <option value=3>No, it makes no difference</option>
                                    <option value=4>I think it should</option>
                                    <option value=2>Am unsure until I get it</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SUBMIT FORM --}}
    <div class="row">
            <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" id="checkbox">
                            I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>
            
                
            
    </div>

    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-large is-primary" id="submit">Submit</button>
                        </div>
        
                    </div>


</form>

@endsection