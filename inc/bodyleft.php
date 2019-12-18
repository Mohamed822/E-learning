<div id="bodyleft">
    <h3>Category Management </h3>
    <ul>
    <li><a href="index.php"><i class='fas fa-home'></i> Dashboard</a></li>
    <li><a href="index.php?category"><i class="fas fa-th"></i> View  Categories</a></li>
    <li><a href="index.php?sub_category">View  sub Categories</a></li>
     <li><a href="index.php?language">View Languages</a></li>
    </ul>
    <h3>Course Management </h3>
    <ul>
    <li><a href="#">Active Courses</a></li>
    <li><a href="#">Pending Courses</a></li>
    <li><a href="#">Unpublsih Course</a></li>
    <li><a href="#">Advanced Course search</a></li>
    </ul>
    
     <h3>User Management </h3>
    <ul>
    <li><a href="#">View All Students </a></li>
    <li><a href="#">View All Teachers</a></li>
    <li><a href="#">Advanced User search</a></li>
    </ul>
    
    <h3>Payment Management </h3>
    <ul>
    <li><a href="#">Pay to instructor </a></li>
    <li><a href="#">View All Complete Orders</a></li>
    <li><a href="#">Advanced Order search</a></li>
    </ul>
    <h3>Page Management </h3>
    <ul>
    <li><a href="index.php?terms">Terms and Conditions page </a></li>
    <li><a href="index.php?contact">Contact Us page</a></li>
    <li><a href="#">About Us Page</a></li>
     <li><a href="#">Faqs Page</a></li>
    <li><a href="#">Edit Slider</a></li>
    </ul>
    
    
</div>


<?php     
   if(isset($_GET['category'])){
       include("cat.php");
   }
       /* sub category */
if(isset($_GET['sub_category'])){
       include("sub_cat.php");
   }
if(isset($_GET['language'])){
       include("lang.php");
   }
if(isset($_GET['terms'])){
       include("terms.php");
   }

if(isset($_GET['contact'])){
       include("contact.php");
   }
  
?>