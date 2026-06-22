  <!-- ***** Preloader Start ***** -->
  {{-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> --}}
  <!-- ***** Preloader End ***** -->
  <header style="background-color:white; padding: 10px 0; position: sticky; top: 0; z-index: 1000;">
    <div style="max-width: 1200px; margin: auto;">
        <div>
            <div>
                <nav style="display: flex; justify-content: space-between; align-items: center;">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{url('/')}}" style="display: flex; align-items: center;">
                        <img src="{{asset('assets/images/logo.png')}}" alt="Logo" style="max-height: 50px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul style="list-style: none; margin: 0; padding: 0; display: flex;">
                        <li style="margin-left: 20px;">
                            <a href="{{url('/')}}" style="color:white; text-decoration: none; font-size: 16px; padding: 10px 15px; transition: background-color 0.3s, color 0.3s; background-color: black; border-radius: 5px;">Home</a>
                        </li>
                        <li style="margin-left: 20px;">
                            <a href="{{url('explore')}}" style="color:white; text-decoration: none; font-size: 16px; padding: 10px 15px; transition: background-color 0.3s, color 0.3s;background-color: black; border-radius: 5px;">Explore</a>
                        </li>
                       
                       
                        @if (Route::has('login'))
                            @auth
                            <li style="margin-left: 20px;">
                              <a href="{{url('book_history')}}" style="color:white; text-decoration: none; font-size: 16px; padding: 10px 15px; transition: background-color 0.3s, color 0.3s;background-color: black; border-radius: 5px;">My History</a>
                          </li>
                                <x-app-layout></x-app-layout>
                            @else
                                <li style="margin-left: 20px;">
                                    <a href="{{ route('login') }}" style="color:white; text-decoration: none; font-size: 16px; padding: 10px 15px; transition: background-color 0.3s, color 0.3s;background-color: black; border-radius: 5px;">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li style="margin-left: 20px;">
                                        <a href="{{ route('register') }}" style="color:white; text-decoration: none; font-size: 16px; padding: 10px 15px; transition: background-color 0.3s, color 0.3s;background-color: black; border-radius: 5px;">Register</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>   
                    <a style="display: none; cursor: pointer; color:white; font-size: 16px;">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- JavaScript to toggle the menu on mobile -->
<script>
    document.querySelector('header > div > div > nav > a').addEventListener('click', function() {
        document.querySelector('header > div > div > nav > ul').classList.toggle('active');
    });

    document.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth <= 768) {
            document.querySelector('header > div > div > nav > a').style.display = 'block';
            document.querySelector('header > div > div > nav > ul').style.display = 'none';
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth <= 768) {
            document.querySelector('header > div > div > nav > a').style.display = 'block';
            document.querySelector('header > div > div > nav > ul').style.display = 'none';
        } else {
            document.querySelector('header > div > div > nav > a').style.display = 'none';
            document.querySelector('header > div > div > nav > ul').style.display = 'flex';
        }
    });

    document.querySelector('header > div > div > nav > a').addEventListener('click', function() {
        const nav = document.querySelector('header > div > div > nav > ul');
        if (nav.style.display === 'flex') {
            nav.style.display = 'none';
        } else {
            nav.style.display = 'flex';
            nav.style.flexDirection = 'column';
            nav.style.width = '100%';
        }
    });
</script>


