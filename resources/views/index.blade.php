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
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/icon-font.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}" />

  <link rel="shortcut icon" type="image/png" href="{{ asset('frontend_assets/img/Split_ride_logo.png') }}" />

  <title>SplitRide</title>
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
          <a href="/showAllRidesAndSearch" class="navigation__link"><span>03</span>Rides</a>
        </li>

      </ul>
    </nav>
  </div>
  <header class="header">
    <div class="header__logo-box">
      <img src="./frontend_assets/img/Split_ride_logo.png" class="header__logo" alt="This is natural tours logo" />
    </div>
    <div class="header__text-box">
      <h1 class="heading-primary">
        <span class="heading-primary--main">SplitRide</span>
        <span class="heading-primary--sub">share the cost and make new friends along the way</span>
      </h1>
      <a href="/showAllRidesAndSearch" class="btn btn--white btn--animated">Discover our rides</a>
    </div>
  </header>
  <main>
    <section>
      <section class="section-about">
        <div class="u-center-text u-margin-bottom-big">
          <h2 class="heading-secondary">
            EXCITING RIDES FOR OUR USERS
          </h2>
        </div>
        <div class="row">
          <div class="col-1-of-2">
            <h3 class="heading-tertiary u-margin-bottom-small">
              You're going to enjoy it
            </h3>
            <p class="paragraph">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. At
              expedita dolor dolores laudantium debitis. Iure reiciendis
              eligendi provident quidem modi sequi incidunt odio quaerat
              itaque quasi, eius maxime velit! Minima?
            </p>
            <h3 class="heading-tertiary u-margin-bottom-small">
              Live adventures like you never have before
            </h3>
            <p class="paragraph">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. At
              expedita dolor dolores laudantium debitis.
            </p>

          </div>
          <div class="col-1-of-2">
            <div class="composition">
              <img src="{{ asset('frontend_assets/img/pic1.jpeg') }}" alt="photo1" class="composition__photo composition__photo--p1" />
              <img src="{{ asset('frontend_assets/img/pic2.jpeg') }}" alt="photo 2" class="composition__photo composition__photo--p2" />
              <img src="{{ asset('frontend_assets/img/pic3.jpeg') }}" alt="photo 3"
                class="composition__photo composition__photo--p3" />
            </div>
          </div>
        </div>
      </section>
    </section>
    <section class="section-features">
      <div class="row">
        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-world"></i>
            <h3 class="heading-tertiary u-margin-bottom-small">
              Save money with SplitRide
            </h3>
            <div class="feature-box__text">
              Carpooling with SplitRide can save students up to 25% on their transportation costs.
            </div>
          </div>
        </div>
        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-compass"></i>
            <h3 class="heading-tertiary u-margin-bottom-small">
             Go green with SplitRide
            </h3>
            <div class="feature-box__text">
              Using SplitRide can reduce traffic congestion and decrease carbon emissions
            </div>
          </div>
        </div>
        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-map"></i>
            <h3 class="heading-tertiary u-margin-bottom-small">
              Earn money driving
            </h3>
            <div class="feature-box__text">
              SplitRide's driver mode offers an opportunity for students to make extra money by providing transportation to their peers
            </div>
          </div>
        </div>
        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-heart"></i>
            <h3 class="heading-tertiary u-margin-bottom-small">
              Community, savings, and environment
            </h3>
            <div class="feature-box__text">
              SplitRide's carpooling feature helps students save money, reduce their carbon footprint, and build a community of like-minded individuals
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-tours">
      <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-secondary">AVAILABLE RIDES</h2>
      </div>
      <div class="row">
         @foreach($ourFrontRides as $ride)
        <div class="col-1-of-3">
          <div class="card">
            <div class="card__side card__side--front">
              <div class="card__picture card__picture--1">&nbsp;</div>
              <h4 class="card__heading">
                <!-- <span class="card__heading-span card__heading-span--1"></span>Uber Safest drive</span> -->
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
                                <form action="/bookRideWithUser/{{ $ride['id'] }}/{{ Auth::user()->id }}" method="POST" id="bookNowForm">
                                    @csrf
                                    <button type="submit" class="btn btn--white u-margin-top-small" id="book_now_btn">Book now!</button>
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
      <div class="u-center-text u-margin-top-big">
        <a href="/showAllRidesAndSearch" class="btn btn--green">Discover all Rides</a>
      </div>
      </div>

    </section>
    <section class="section-stories">
      <div class="bg-video">
        <video class="bg-video__content" autoplay muted loop>
          <source src="{{ asset('frontend_assets/img/video.mp4') }}" type="video/mp4" />
          <source src="{{ asset('frontend_assets/img/video.webm') }}" type="video/webm" />
          Your browser is not supported
        </video>
      </div>
      <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-secondary">we make people geniunely happy</h2>
      </div>
      <div class="row">
        <div class="story">
          <figure class="story__shape">
            <img src="{{ asset('frontend_assets/img/nat-8.jpg') }}" alt="Person on a tour" class="story__image" />
            <figcaption class="story__caption">John</figcaption>
          </figure>
          <div class="story__text">
            <h3 class="heading-tertiary u-margin-bottom-small">
              I SAVED A LOT OF MONEY BECAUSE OF SPLITRIDE
            </h3>
            <p>
              With SpliteRide, i have reduced my spending on transportation more than 50%. With SpliteRide i don't have to worry about spending too much on my transportation to the university or going back home.
            </p>
          </div>
        </div>
        <div class="story">
          <figure class="story__shape">
            <img src="{{ asset('frontend_assets/img/nat-9.jpg') }}" alt="Person on a tour" class="story__image" />
            <figcaption class="story__caption">Jopsa</figcaption>
          </figure>
          <div class="story__text">
            <h3 class="heading-tertiary u-margin-bottom-small">
              WITH EACH RIDE I MAKE, NEW FRIENDS I MADE
            </h3>
            <p>
              With SplitRide I have expended my circle of friends, i met many friends from different majors and different cultures. More friends, more adventures
            </p>
          </div>
        </div>
      </div>
      <!-- <div class="u-center-text">
        <a href="#" class="btn-text">Read all stories &rarr;</a>
      </div> -->
    </section>
  </main>
  <!-- Footer Designing -->
  <footer class="footer">
    <div class="footer__logo-box">
      <img src="{{ asset('frontend_assets/img/Split_ride_logo.png') }}" alt="Full logo" class="footer__logo" />
    </div>
    <div class="row">
      <div class="col-1-of-2">
        <div class="footer__navigation">
          <ul class="footer_list">
            <li class="footer__item">
              <a href="" class="footer__link">Company</a>
            </li>
            <li class="footer__item">
              <a href="" class="footer__link">Contact us</a>
            </li>
            <li class="footer__item">
              <a href="" class="footer__link">Careers</a>
            </li>
            <li class="footer__item">
              <a href="" class="footer__link">Privacy policy</a>
            </li>
            <li class="footer__item">
              <a href="" class="footer__link">Terms</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-1-of-2">
        <p class="footer__copyright">
          Built my <a href="#" class="footer_link">BookingSite.com</a>
        </p>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script>
jQuery('#bookNowForm').submit(function(e){
    e.preventDefault();
     alert('Your ride is booked');

});

  </script>
  </body>

</html>
