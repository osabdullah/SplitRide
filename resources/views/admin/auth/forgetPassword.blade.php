<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <a href="/" class="navigation__link"><span>01</span>About Booking</a>
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

  <main>

    <!-- Form Design -->
    <section class="section-book">
      <div class="row">
        <div class="book book1">
          <div class="book__form">
            <form class="form" method="post" action="{{ route('forget.password.post') }}">
              @csrf
              <div class="u-margin-bottom-medium">
                <h2 class="heading-secondary">Forget Password</h2>
              </div>
                @if (Session::has('message'))
                    <div class="custom__alert custom__alert--red" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
              <div class="form__group">
                <input type="email" name="email" class="form__input" placeholder="Email address" id="email" required />
                <label for="email" class="form__label">Email</label>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>

               <div class="form__group">
                <button class="btn btn--green">Send Password Reset Link &rarr;</button>
              </div>

               </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>
