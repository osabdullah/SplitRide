<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
  rel="stylesheet"
  />

  <link rel="stylesheet" href="{{ asset('frontend_assets/css/icon-font.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}" />

  <link rel="shortcut icon" type="image/png" href="{{ asset('frontend_assets/img/favicon.png') }}" />

  <title>Ride Booking | Exciting for travels</title>
</head>

<body>
  <div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle" />
    <label for="navi-toggle" class="navigation__button">
      <span class="navigation__icon">&nbsp;</span>
    </label>
    <div class="navigation__background">&nbsp;</div>
    <nav class="navigation__nav">
      <ul class="navigation__list">
        <li class="navigation__item">
          <a href="/login" class="navigation__link"><span>01</span>Login</a>
        </li>
        <li class="navigation__item">
          <a href="/register" class="navigation__link"><span>02</span>Register</a>
        </li>
        <li class="navigation__item">
          <a href="/" class="navigation__link"><span>03</span>Home</a>
        </li>

      </ul>
    </nav>
  </div>
  <main>
    <section class="">
            <div class="u-margin-bottom-small">
                <h2 class="heading-secondary">Search Ride here</h2>
            </div>
            <form class="form" method="post" action="/searchRide" class="book__search">
              @csrf
             <div class="book__search">
                <div class="form__group">
                <input type="text" class="form__input" name="searchRide" placeholder="Search your ride" id="name" required />
              </div>
               <div class="form__group">
                <button class="btn btn--green">Search</button>
              </div>
               </div>
            </form>
      </div>
    </section>
    <section class="section-tours">
      <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-secondary">Most popular Rides</h2>
      </div>
      <div class="row">
         @foreach($rides as $ride)
        <div class="col-1-of-3">
          <div class="card">
            <div class="card__side card__side--front">
              <div class="card__picture card__picture--1">&nbsp;</div>
              <h4 class="card__heading">
                <span class="card__heading-span card__heading-span--1"></span>Uber Safest drive</span>
              </h4>
              <div class="card__details">
                <ul>
                  <li>{{ $ride['title'] }}</li>
                  <li>{{ $ride['description'] }}</li>
                  <li>Origion: {{ $ride['origion'] }}</li>
                  <li>Destination: {{ $ride['destination'] }}</li>
                  <li>Booking Time: {{ $ride['timeOfRide'] }}</li>
                  <li>Capacity : {{ $ride['totalCapacity'] }}</li>
                  <li>Available : {{ $ride['availableCapacity'] }}</li>
                </ul>
              </div>
            </div>
            @if(auth()->check())
                @if($ride['availableCapacity']>0)
                    <div class="card__side card__side--back card__side--back-1">
                    <div class="card__cta">
                        <div class="card__price-box">
                        <p class="card__price-only">only</p>
                        @if($ride['price'] != "TPA")
                        <p class="card__price-value">${{ $ride['price'] }}</p>
                        @else
                        <p class="card__price-value">{{ $ride['price'] }}</p>
                        @endif
                        </div>
                            <a href="/showMap" class="btn btn--white u-margin-bottom-small">Google Map</a>
                            <a href="/chatWithNewUser/{{ $ride['id'] }}/{{ $ride['userId'] }}" class="btn btn--white u-margin-bottom-small">Private Chat</a>
                            <a href="/groupChatWithNewUser/{{ $ride['id'] }}/{{ $ride['userId'] }}" class="btn btn--white">Group Chat!</a>
                                <form action="/bookRideWithUser/{{ $ride['id'] }}/{{ Auth::user()->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn--white u-margin-top-small">Book now!</button>
                                </form>

                    </div>
                    </div>
                @else
                <div class="card__side card__side--back card__side--back-2">
                <div class="card__cta">
                    <div class="card__price-box">
                    <p class="card__price-only">only</p>
                     @if($ride['price'] != "TPA")
                        <p class="card__price-value">${{ $ride['price'] }}</p>
                        @else
                        <p class="card__price-value">{{ $ride['price'] }}</p>
                        @endif
                    </div>
                     <a href="/showMap" class="btn btn--white u-margin-bottom-small">Google Map</a>
                        <a href="/chatWithNewUser/{{ $ride['id'] }}/{{ $ride['userId'] }}" class="btn btn--white u-margin-bottom-small">Private Chat</a>
                        <a href="/groupChatWithNewUser/{{ $ride['id'] }}/{{ $ride['userId'] }}" class="btn btn--white">Group Chat!</a>
                        <div class="card__price-box u-margin-top-small">
                        <p class="card__price-only ">This ride is full of capacity</p>
                        </div>
                </div>
                </div>
                @endif
            @else
             <div class="card__side card__side--back card__side--back-1">
              <div class="card__cta">
                <div class="card__price-box">
                 <p class="card__price-only">Please login first</p>
                </div>
            </div>
            </div>
           @endif
          </div>
        </div>
        @endforeach

      </div>
    <div class="row">
        <div class="u-margin-top-big">
           {{ $rides->links() }}
        </div>
      </div>
      <div class="u-center-text">
        <a href="/" class="btn btn--green">Home</a>
      </div>
    </section>

  </main>
  </body>

</html>
