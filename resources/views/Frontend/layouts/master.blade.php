<!DOCTYPE html>
<html lang="en">

  <head>
@include('Frontend.includes.head')
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('Frontend.includes.nav')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    @yield('banner')
    <!-- Banner Ends Here -->

    


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                @yield('content')
              </div>
            </div>
          </div>
        @include('Frontend.includes.sidebar')
          
        </div>
      </div>
    </section>

    @include('Frontend.includes.footer')
    
    

    @include('Frontend.includes.script')

  </body>
</html>