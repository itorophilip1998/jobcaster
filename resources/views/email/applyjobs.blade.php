<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jobcaster</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
       {{-- Apply Jobs --}}
   <div style="padding: 0px 0px !important;border-radius: 5px !important;">
    <header style="background-color:whitesmoke;text-align: center;border-radius: 3px; padding: 3px 3px;">
            <h2><span style="color: grey;">Job</span><span style="color: royalblue;">Caster</span></h2>
    </header>
    <div style="padding:10px;text-align: center;">
     <br><br>
             <div > 
               <h4 style="text-align:center;">!Hello {{ $data['name'] }}</h4>
                 Your application and Resume have been successfully uploaded to
                 {{ $company }}  <br>
                 Thank's for using jobcaster
             </div>  <br><br> <br>
    </div>
    <footer style="padding:3px 3px;text-align:center !important;border-radius:3px!important;background:whitesmoke !important;opacity:70% !important">
        <h6>©Copyright 2020 @ Jobcaster(HRMS)
            <br>By<br>
           Team A(Human Resource Management System) 
            <br> 
            <span style="color: grey !important;">For More Information contact us <a href="" style="color: royalblue !important;">https://jobcaster.netlify.com</a></span></h6>
        
    </footer>
   </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 </body>
</html>
