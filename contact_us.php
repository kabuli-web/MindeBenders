<?php
    if(isset($_SESSION))
    {

    }
    else
    {
        session_start();
    }
?>

<html lang="en">
    <head id="header">
        <?php include './views/global_head_links.php';?>
        
        <link rel="stylesheet" href="./css/contact_us.css">
      </head>

<body>


<!-- Here we include th header -->
<?php include './views/navbar.php';?>

<h1 class="contact-header-text"> Contact Us</h1>
    <div class="contact-page-img-div">
        <img class="contact-page-img" src="./assets/Feedback 4.png" alt="">
    </div>
    <div class="contact-cards">

            <div class="contact-card">

                
                <img src="./assets/phone-call.png" class= 'contact_icon' alt="">
                <h4 class="contact-title">Call Us</h4>
                <h5 class="contact"><a class="contact-link" href="tel:0553608481">0553608481</a></h5>
            </div>
        <div class="contact-card">
            <img src="./assets/location.png" class= 'contact_icon' alt="">
            <h4 class="contact-title">Meet Us</h4>
            <h5 class="contact">ِ<a href="https://goo.gl/maps/r8zBfDDGnTE7nyb28" class="contact-link">Arab Open University</a></h5>
        </div>
        <div class="contact-card">
            <img src="./assets/contact_email.png" class= 'contact_icon' alt="">
            <h4 class="contact-title">Send Us Email</h4>
            <h5 class="contact"><a href="mailto:muhammadsamad2@gmail.com" class="contact-link">
                muhammadsamad2@gmail.com
            </a></h5>
        </div>
    </div>
<iframe style="width:80%;" width="976" height="553" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=976&amp;height=553&amp;hl=en&amp;q=24%C2%B031'06.6%22N%2039%C2%B042'07.0%22E%20+(Mind%20Benders%20)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='https://embedmaps.net'>add map to website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=352dd834b48a43f44af5b19f1afd72d6e4f2eb1c'></script>

<?php include './views/footer.php';?>
   
   
</body>
</html>