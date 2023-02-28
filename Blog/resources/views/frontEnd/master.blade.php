<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
{{--    <link rel="icon"  href ="{{asset('frontEndAsset')}}/assets/img/favicon.ico">--}}
    <title>Blog | @yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link  href ="{{asset('frontEndAsset')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link  href ="{{asset('frontEndAsset')}}/assets/css/mediumish.css" rel="stylesheet">
</head>
<body>

    @include('frontEnd.include.header')

    <!-- Begin Featured
    ================================================== -->
   @yield('content')
    <!-- End List Posts
    ================================================== -->

    <!-- Begin Footer
    ================================================== -->
    @include('frontEnd.include.footer')
    <!-- End Footer
    ================================================== -->



<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('frontEndAsset')}}/assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{asset('frontEndAsset')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('frontEndAsset')}}/assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="js/bootstrap/bootstrap-dropdown.js"></script>
<script>
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
    });
</script>
</body>
</html>
