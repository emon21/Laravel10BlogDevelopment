<!DOCTYPE html>
<html lang="en">
<head>
<title>Mini Blog</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/font-awesome-line-awesome/css/all.min.css" integrity="sha512-dC0G5HMA6hLr/E1TM623RN6qK+sL8sz5vB+Uc68J7cBon68bMfKcvbkg6OqlfGHo1nMmcCxO5AinnRTDhWbWsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('frontend') }}/fonts/icomoon/style.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/aos.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
</head>
<body>

    @yield('content')

<script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery-ui.js"></script>
<script src="{{ asset('frontend') }}/js/popper.min.js"></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.stellar.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('frontend') }}/js/aos.js"></script>
<script src="{{ asset('frontend') }}/js/main.js"></script>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"8478ebd16b693368","b":1,"version":"2024.1.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>
