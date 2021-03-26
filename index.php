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

      </head>

<body>


<!-- Here we include th header -->
<?php include './views/navbar.php';?>

    <div class="banner">
        <img style="width: 380; "src="./assets/testing-new-tech.png" alt="banner image">
        <div class="banner-text-content">
            <h1 class="banner-title">Mind Benders</h1>
            <p class="banner-disc">Use your skills to bring ideas to life. At Mind benders we share ideas, learn, create and have fun </p>
            <a href="./signup.php">
                <button class="primary-button">Register</button>
            
            </a>
        </div>
    </div>
    
    <div class="tags-div">
        
    </div>
      <div class="content">
          <h2 class="content-header">Activities</h2>
          <div class="cards">
      
      <a href="./signup.php"><div class="card" style="background-color: rgba(252,104,123,89%);">
                      <img style="width: 230; height: 172;"  src="./assets/build--product.png" alt="card image">
                      <h5 class="card-title">programming Competition</h5>
                      <h5 class="card-count">participants:5</h5>
                      
                  </div></a>
                  <a href="./signup.php"><div class="card" style="background-color:rgba(67,58,246,47%) ;">
                      <img style="width: 230; height: 172;" src="./assets/web-development.png" alt="card image">
                      <h5 class="card-title">Professional Certification</h5>
                      <h5 class="card-id">participants:2</h5>
                      
                  </div> </a>     
          </div>
      </div>
<?php include './views/footer.php';?>

   
</body>
</html>