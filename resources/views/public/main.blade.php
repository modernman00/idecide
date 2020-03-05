@extends('layouts.base_bootstrap')

@section('title', 'Decision Matrix')


@section('content')

<form action="/main" method="POST">

    <div class="notification"></div>

    <?php

    $formArray = [

        'token' => 'token',     
        'purchase' => ['card', 
            'cardText' => 'What do you want to buy? This could be anything?',
            'cardImg'=>'/img/questions/purchase1.jpg'   
        ], 
        'purpose' => ['card', 
            'cardText' => 'Why do you need/want it?Think carefully about this question.', 
            'cardImg'=>'/img/questions/purpose.jpg'    
        ],
        'finance' => ['cardSelect', 
            'cardText' => 'How do you intend to source the money to buy this item.', 
            'cardImg'=>'/img/questions/finance.jpg',
            'cardOptions' => ['Savings', 'Salary/Bonus/Dividend/Profit', 'Credit Card/Loan/Monthly repayment', 'Gift', 'Free cash'],
            'cardValue' => [5, 5, 2, 5, 5]
        ],
        'necessity' => ['cardSelect', 
            'cardText' => 'Is this a "Need - necessary" or a "Want - nice to have"?',
            'cardImg'=>'/img/questions/purpose2.jpg', 
            'cardOptions' => ['Yes - Necessity. I really need it', 'I love and want it', 'It is just something nice to have', 'I just feel like spending to spoil myself'],
            'cardValue' => [5, 4, 3, 2]
        ],    
        'reward' => ['cardSelect', 
            'cardText' => 'If you bought it, how will make you feel?',
            'cardImg'=>'/img/questions/reward.jpg', 
            'cardOptions' => ['Very happy even if bought with loan', 'It will add to my self esteem', 'It should make me happy', 'Makes me feel relevant', 'Happy, but may later have regrets', 'It won\'t make a difference to how I feel'],
            'cardValue' => [5, 5, 3, 2,1,1]
        ], 
        'options' => ['cardSelect', 
            'cardText' => 'Have you considered other options or alternatives?',
            'cardImg'=>'/img/questions/options.jpg', 
            'cardOptions' => ['Yes, but this seems as the best options', 'No, perhaps I should', 'I don\'t need to look at other options', 'Am clear this is what I want.'],
            'cardValue' => [5, 2, 2, 3]
        ],   

        'affordability' => ['cardSelect', 
            'cardText' => 'Can you afford it without stretching your finance?',
            'cardImg'=>'/img/questions/affordale2.jpg', 
            'cardOptions' => ['Yes!', 'Yes, but I may need to cut my expenses', 'Someone else is paying for it', 'Possibe big risk to my finance', 'I think it will be fine'],
            'cardValue' => [5, 2, 5, 1, 1]
        ],   
        'concerns' => ['cardSelect', 
            'cardText' => 'Do you have concerns about either your debt level/expenses/job?',
            'cardImg'=>'/img/questions/concern2.jpg', 
            'cardOptions' => ['My income is robust', 'Expenses and debt level are quite low', 'Yes, but it shouldn\'t make a difference', 'I have serious concerns'],
            'cardValue' => [5, 4, 3, 1]
        ], 
        'value' => ['cardSelect', 
            'cardText' => 'Sometimes, purchase could be an investment in one\'s goal and self esteem?',
            'cardImg'=>'/img/questions/value.jpg', 
            'cardOptions' => ['Yes, I will spur me onto greater things', 'No, it makes no difference', 'I think it should', 'Am unsure until I get it'],
            'cardValue' => [5, 3, 4, 2]
        ],

        'checkbox' => 'checkbox',
        'button' => 'button',
    ];


 
    $form = new App\classes\BuildForm($formArray);
    echo "<div class='row'>";
    $form->genForm('col-xs-4');
    echo "</div>";




    ?>

    {{-- <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/dad.jpg" class="card-img" height="50" width="50" alt="...">
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
    </div> --}}

    {{-- SUBMIT FORM --}}



    <div class="form-check mb-4">

        <div class='mb-3'>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              I agree that iDecide only use the information you provide to 
            </label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block" id="submit" name="submit">Submit</button>
    </div>
    


                         
                   
        
                    </div>


</form>

@endsection