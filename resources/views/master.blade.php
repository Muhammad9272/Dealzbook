<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <title> {{$gs->title}} @yield('title')</title>
    <meta property="og:image" content="@yield('image')">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{--  <link href="{{ mix('css/tailwind.css') }}" rel="stylesheet">  --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    {{--  <link href="{{ asset('css/viewer.css') }}" rel="stylesheet">  --}}

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  
    <link href="{{ asset('canyon/css/flipbook.style.css') }}" rel="stylesheet">
    <link href="{{ asset('canyon/css/font-awesome.css') }}" rel="stylesheet">
    
    <script src="/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="{{ mix('js/alpine.min.js') }}" defer></script>
    <script src="/js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="icon" 
      href="{{asset('assets/images/'.$gs->favicon)}}" />
      <style type="text/css">
          .cat-box-s .hovereffect, .cat-box-s .hovereffect1{
            cursor: pointer !important;
          }
          .nd-link{
              color: black;
          }
           .nd-link:hover{

             text-decoration: none !important;
          }
         /* .customMainNav .container .flex{
           
          }
          .customMainNav .container .flex .navbar-brand img{
            width: 70%;
          }*/
      </style>
    
    <script src="/js/umd_popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/js/1bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    @section('pagelevel_scripts')
    @show
    <script type="text/javascript">
       $(document).ready(function(){
          $('.clckcatalog').on('click',function () {            
            var mainurl = "{{url('/')}}";
            var url1=mainurl+$(this).find('.info').attr( "href");
            window.location=url1;
          })
       })
    </script>

    <script type="text/javascript">  
        function copyreferlink($id) {
        /* Get the text field */
        var target ="referlink"+$id;

        var copyText = document.getElementById(target);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

      }
    </script>
  




    
</head>
<body>
  
<div class="flex-center position-ref full-height">

    <!-- navigation -->
      @include('partials/navigation')
    <!-- navigation end -->

    <div class="">
        @yield('content')
    </div>

    <!-- page description -->
   {{--  @include('partials/page_description') --}}
    <!-- page description end-->

    @include('partials/footer')

</div>



</body>
</html>
