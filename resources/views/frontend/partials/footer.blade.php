<div class="site-footer">
    <div class="container">
    <div class="row mb-5">
    <div class="col-md-4">
    <h3 class="footer-heading mb-4">{{ $setting->site_name }}</h3>
    <p class="text-justify">{{ $setting->about_site }}</p>
    </div>
    <div class="col-md-3 ml-auto">

    <ul class="list-unstyled float-left mr-5">
    <li><a href="{{ route('website') }}">Home</a></li>
    <li><a href="{{ route('website.about') }}">About Us</a></li>
    <li><a href="{{ route('website.contact') }}">Contact Us</a></li>
    <li><a href="#">Subscribes</a></li>
    </ul>
    <ul class="list-unstyled float-left">
        @foreach ($categories as $category)

        <li><a href="{{ route('website.category',$category->category_slug) }}">{{ $category->category_name }}</a></li>
        @endforeach

    </ul>
    </div>
    <div class="col-md-4">
    <div>
    <h3 class="footer-heading mb-4">Connect With Us</h3>
        <p>
            @if ($setting->facebook)
                <a target="_blank" href="{{ $setting->facebook }}">
                    <span class="{{ $setting->facebook }} pt-2 pr-2 pb-2 pl-0"></span>
                </a>
            @endif
            @if ($setting->twitter)
                <a target="_blank" href="{{ $setting->twitter }}">
                    <span class="{{ $setting->twitter }} pt-2 pr-2 pb-2 pl-0"></span>
                </a>
            @endif
            @if ($setting->instagram)
                <a target="_blank" href="{{ $setting->instagram }}">
                    <span class="{{ $setting->instagram }} p-2"></span>
                </a>
            @endif
            @if ($setting->reddit)
                <a target="_blank" href="{{ $setting->reddit }}">
                    <span class="{{ $setting->reddit }} p-2"></span>
                </a>
            @endif
            @if ($setting->email)
                <a target="_blank" href="{{ $setting->email }}">
                    <span class="{{ $setting->email }} p-2"></span>
                </a>
            @endif
        </p>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-12 text-center">
    <p>

  {{ $setting->copyright }} | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
  <p class="mb-0">Developed By Hasib on
    <a href="#" target="_blank">Laravel Blog Development Series</a>
  </p>

    </p>
    </div>
    </div>
    </div>
    </div>
