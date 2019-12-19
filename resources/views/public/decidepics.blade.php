@extends('layouts.base2')

@section('title', 'Help me decide')


@section('content')


<ul class="cards">
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--fence"></div>
      <div class="card__content">
        <div class="card__title">What do you want to buy?</div>
        <p class="card__text">How long have you been thinking about it? </p>
        <div class="btn btn--block card__btn">
        <select>
                            <option>Select dropdown</option>
                            <option>Necessary - I really need it/option>
                            <option>I love and want it</option>
                            <option>Just something nice to have</option>
                            <option>Hmmm, not a need or want - just feel like spending</option>
                        </select>
                    </div>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--river"></div>
      <div class="card__content">
        <div class="card__title">Necessity</div>
        <p class="card__text">Is this a "Need - necessary" or a "Want - nice to have"?.</p>
        <button class="btn btn--block card__btn">
        <select>
                            <option>Select dropdown</option>
                            <option>Necessary - I really need it/option>
                            <option>I love and want it</option>
                            <option>Just something nice to have</option>
                            <option>Hmmm, not a need or want - just feel like spending</option>
                        </select>


        </button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--record"></div>
      <div class="card__content">
        <div class="card__title">Cost</div>
        <p class="card__text">What will it cost?What wilhhhhhhhhhhhhl it cost?</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
  <li class="cards__item">
    <div class="card">
      <div class="card__image card__image--flowers"></div>
      <div class="card__content">
        <div class="card__title">Flex Basis</div>
        <p class="card__text">This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means "look at my width or height property."</p>
        <button class="btn btn--block card__btn">Button</button>
      </div>
    </div>
  </li>
</ul>

@endsection