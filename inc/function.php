<?php 
function add_cat()
{
    include("inc/db.php");
    if(isset($_POST['add_cat']))
    {
        $cat_name=$_POST['cat_name'];
        
        $check=$con->prepare("select * from category where cat_name='$cat_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();
        
        if($count==1)
        {
              echo"<script>alert('Category Already Added ')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>";
        }
        else
        {
              $add_cat=$con->prepare("insert into category(cat_name) values('$cat_name')");
        if($add_cat->execute())
        {
            echo"<script>alert('Category Added Succefuly')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>";
        }
        else{
            echo"<script>alert('Category Not Added Succefuly')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>";
        }
            
        }
       
    }
    
}

/// Language Function 

function add_lang()
{
    include("inc/db.php");
    if(isset($_POST['add_lang']))
    {
        $lang_name=$_POST['lang_name'];
        
        $check=$con->prepare("select * from language where lang_name='$lang_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();
        
        if($count==1)
        {
              echo"<script>alert('Language Already Added ')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
        else
        {
              $add_cat=$con->prepare("insert into language(lang_name) values('$lang_name')");
        if($add_cat->execute())
        {
            echo"<script>alert('Language Added Succefuly')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
        else{
            echo"<script>alert('Language Not Added Succefuly')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
            
        }
       
    }
    
}
//view language function 
function view_lang()
{
    include("inc/db.php");
    include("inc/db.php"); 
    $get_lang=$con->prepare("select * from language");
    $get_lang->setFetchMode(PDO:: FETCH_ASSOC);
    $get_lang->execute();
    $i=1;
    while($row=$get_lang->fetch()):
    echo"<tr>
    
    <td>".$i++." </td>
    <td>".$row['lang_name']."</td>
    <td><a href='index.php?language&edit_lang=".$row['lang_id']."'>Edit <a/></td>
    <td><a href='index.php?language&del_lang=".$row['lang_id']."'>Delete <a/></td>
    </tr>";
    endwhile;
    
    //delete button in language
    if(isset($_GET['del_lang']))
    {
        $id=$_GET['del_lang'];
        
        $del=$con->prepare("delete from language where lang_id='$id'");
        if($del->execute())
        {
            echo"<script>alert('Language Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
        else
        {
             echo"<script>alert('Language Not Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>"; 
        }
    }
        
}

//edit language function
function edit_lang()
{
    include("inc/db.php");
    if(isset($_GET['edit_lang']))
    {
        $id=$_GET['edit_lang'];
        $get_cat=$con->prepare("select * from language where lang_id='$id'");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $row=$get_cat->fetch();
        echo"<h3>Edit Language</h3>
   <form id='edit_form' method='post' enctype='multipart/form-data'>
     <input type='text' name='lang_name' value='".$row['lang_name']."' placeholder='Enter Language Name Here'> 
     <center><button name='edit_lang'>Edit Language</button></center>
   </form>";
        if(isset($_POST['edit_lang']))
        {
            $lang_name=$_POST['lang_name'];
            $check=$con->prepare("select * from language where lang_name='$lang_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();
        
        if($count==1)
        {
              echo"<script>alert('Language Already Updated ')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
        else
        {
            $up_cat=$con->prepare("update Language set lang_name='$lang_name' where lang_id='$id'");
        if($up_cat->execute())
        {
            echo"<script>alert('Language Updated Succefuly')</script>";
            echo"<script>window.open('index.php?lan','_self')</script>";
        }
        else{
            echo"<script>alert('Language Not Updated Succefuly')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
        }
    }
    }
    
}



//edit cat function 
function edit_cat()
{
    include("inc/db.php");
    if(isset($_GET['edit_cat']))
    {
        $id=$_GET['edit_cat'];
        $get_cat=$con->prepare("select * from category where cat_id='$id'");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $row=$get_cat->fetch();
        echo"<h3>Edit Category</h3>
   <form id='edit_form' method='post' enctype='multipart/form-data'>
     <input type='text' name='cat_name' value='".$row['cat_name']."' placeholder='Enter Category Name Here'> 
     <center><button name='edit_cat'>Edit category</button></center>
   </form>";
        if(isset($_POST['edit_cat']))
        {
            $cat_name=$_POST['cat_name'];
            $check=$con->prepare("select * from category where cat_name='$cat_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();
        
        if($count==1)
        {
              echo"<script>alert('Category Already Updated ')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>";
        }
        else
        {
            $up_cat=$con->prepare("update category set cat_name='$cat_name' where cat_id='$id'");
        if($up_cat->execute())
        {
            echo"<script>alert('Category Updated Succefuly')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>";
        }
        else{
            echo"<script>alert('Category Not Updated Succefuly')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>";
        }
        }
    }
    }
    
}

//sub cat edit

function edit_sub_cat()
{
    include("inc/db.php");
    if(isset($_GET['edit_sub_cat']))
    {
        $id=$_GET['edit_sub_cat'];
        $get_cat=$con->prepare("select * from sub_category where sub_cat_id='$id'");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $row=$get_cat->fetch();
        
        $cat_id=$row['cat_id'];
        $get_c=$con->prepare("select * from category where cat_id='$cat_id'");
        $get_c->setFetchMode(PDO:: FETCH_ASSOC);
        $get_c->execute();
        $row_cat=$get_c->fetch();
        
            
        echo"<h3>Edit sub Category</h3>
   <form id='edit_form' method='post' enctype='multipart/form-data'>
   
   <select name='cat_id'>
         <option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
         echo select_cat();      
        echo" </select>
         
     <input type='text' name='sub_cat_name' value='".$row['sub_cat_name']."' placeholder='Enter Category Name Here'> 
     <center><button name='edit_sub_cat'>Edit category</button></center>
   </form>";
        if(isset($_POST['edit_sub_cat']))
        {
            $cat_name=$_POST['sub_cat_name'];
            $cat_id=$_POST['cat_id'];
           
            $up_cat=$con->prepare("update sub_category set sub_cat_name='$cat_name', cat_id='$cat_id' where sub_cat_id='$id'");
        if($up_cat->execute())
        {
            echo"<script>alert('Category Updated Succefuly')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        }
        else{
            echo"<script>alert('Category Not Updated Succefuly')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        }
        
    }
    }
    
}


//Add view cat 

function view_cat()
{
    include("inc/db.php");
    include("inc/db.php"); 
    $get_cat=$con->prepare("select * from category");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $i=1;
    while($row=$get_cat->fetch()):
    echo"<tr>
    
    <td>".$i++." </td>
    <td>".$row['cat_name']."</td>
    
    <td><a href='index.php?category&edit_cat=".$row['cat_id']."'title='Edit'><i class='far fa-edit'></i></a>
        <a style='color:#f00' href='index.php?category&del_cat=".$row['cat_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
    
    </tr>";
    endwhile;
    
    //delete button in sub category
    if(isset($_GET['del_cat']))
    {
        $id=$_GET['del_cat'];
        
        $del=$con->prepare("delete from category where cat_id='$id'");
        if($del->execute())
        {
            echo"<script>alert('Category Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>";
        }
        else
        {
             echo"<script>alert('Category Not Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?cat','_self')</script>"; 
        }
    }
        
}


/* SUB CATEGORY DATABASE FUNCTION */
function add_sub_cat()
{
    include("inc/db.php");
    if(isset($_POST['add_sub_cat']))
    {
        $cat_name=$_POST['sub_cat_name'];
        $cat_id=$_POST['cat_id'];
        $check=$con->prepare("select * from sub_category where sub_cat_name='$cat_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();
        
        if($count==1)
        {
              echo"<script>alert('Sub Category Already Added ')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        }
        else
        {
              $add_cat=$con->prepare("insert into sub_category(sub_cat_name,cat_id) values(' $cat_name',' $cat_id')");
        if($add_cat->execute())
        {
            echo"<script>alert('Sub Category Added Succefuly')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        }
        else{
            echo"<script>alert('Sub Category Not Added Succefuly')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        }
            
        }
       
    }
    
}

function view_sub_cat()
{
    include("inc/db.php");
    include("inc/db.php");
    $get_cat=$con->prepare("select * from sub_category");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $i=1;
    while($row=$get_cat->fetch()):
    $id=$row['cat_id'];
    $get_c=$con->prepare("select * from category where cat_id='$id' ");
    $get_c->setFetchMode(PDO:: FETCH_ASSOC);
    $get_c->execute();
    $row_cat=$get_c->Fetch();
    echo"<tr>
    
    <td>".$i++." </td>
        <td>".$row['sub_cat_name']."</td>
        <td>".$row_cat['cat_name']."</td>
        <td><a href='index.php?sub_category&edit_sub_cat=".$row['sub_cat_id']."'title='Edit'><i class='far fa-edit'></i><a/>
        <a href='index.php?sub_category&del_sub_cat=".$row['sub_cat_id']."'title='Delete'><i class='far fa-trash-alt'></i> <a/></td>
    </tr>";
    endwhile;
    
    ////delete button in sub category
    if(isset($_GET['del_sub_cat']))
    {
        $id=$_GET['del_sub_cat'];
        
        $del=$con->prepare("delete from sub_category where sub_cat_id='$id'");
        if($del->execute())
        {
            echo"<script>alert('Sub Category Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        }
        else
        {
             echo"<script>alert('Sub Category Not Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>"; 
        }
    }
   

}



function select_cat()
{
    include("inc/db.php");
    $get_cat=$con->prepare("select * from category");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    while($row=$get_cat->fetch()): 
    echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option> ";
    endwhile;
}

function add_term()
{
    include("inc/db.php");
    if(isset($_POST['add_term']))
    {
        $cat_name=$_POST['term'];
        $cat_id=$_POST['for_whome'];
        $check=$con->prepare("select * from term where term='$cat_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCount();
        
        if($count==1)
        {
              echo"<script>alert('Term is Already Added ')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
        }
        else
        {
              $add_cat=$con->prepare("insert into term(term,for_whome) values(' $cat_name',' $cat_id')");
        if($add_cat->execute())
        {
            echo"<script>alert('Term is Added Succefuly')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
        }
        else{
            echo"<script>alert('Term Not Added Succefuly')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
        }
            
        }
       
    }
    
}


function view_term()
{
    include("inc/db.php");
    include("inc/db.php");
    $get_c=$con->prepare("select * from term ");
    $get_c->setFetchMode(PDO:: FETCH_ASSOC);
    $get_c->execute();
    $i=1;
    while($row=$get_c->Fetch()):
    echo"<tr>
    
    <td>".$i++." </td>
        <td>".$row['term']."</td>
        <td>".$row['for_whome']."</td>
        <td><a href='index.php?terms&edit_term=".$row['t_id']."'title='Edit'><i class='far fa-edit'></i><a/>
        <a href='index.php?terms&del_term=".$row['t_id']."'title='Delete'><i class='far fa-trash-alt'></i> <a/></td>
    </tr>";
  
    endwhile;
    ////delete button in sub category
    if(isset($_GET['del_term']))
    {
        $id=$_GET['del_term'];
        
        $del=$con->prepare("delete from term where t_id='$id'");
        if($del->execute())
        {
            echo"<script>alert('Term Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
        }
        else
        {
             echo"<script>alert('Term  Not Deleted Succefuly')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>"; 
        }
    }
   

}

function edit_term()
{
    include("inc/db.php");
    if(isset($_GET['edit_term']))
    {
        $id=$_GET['edit_term'];
        $get_cat=$con->prepare("select * from term where t_id='$id'");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $row=$get_cat->fetch();
        
       
            
        echo"<h3>Edit T&C </h3>
   <form id='edit_form' method='post' enctype='multipart/form-data'>
   
   <select name='for_whome'>
         <option value='".$row['for_whome']."'>".$row['for_whome']."</option>
          <option value='Student'>Student</option>
          <option value='Teacher'>Teacher</option>";      
        echo" </select>
         
     <input type='text' name='term' value='".$row['term']."' placeholder='Enter Category Name Here'> 
     <center><button name='edit_t'>Edit T&C </button></center>
   </form>";
        if(isset($_POST['edit_t']))
        {
            $cat_name=$_POST['term'];
            $cat_id=$_POST['for_whome'];
           
            $up_cat=$con->prepare("update term set term='$cat_name', for_whome='$cat_id' where t_id='$id'");
        if($up_cat->execute())
        {
            echo"<script>alert('Term Updated Succefuly')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
        }
        else{
            echo"<script>alert('Term Not Updated Succefuly')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
        }
        
    }
    }
    
}

function contact(){
    include("inc/db.php");
   $get_con=$con->prepare("select * from contact");
    $get_con->setFetchMode(PDO:: FETCH_ASSOC);
    $get_con->execute();
    $row=$get_con->fetch();
    echo"<form method='post' enctype='multipart/form-data'>
         <table>
         <tr>
            <td>Update contact No .</td>
             <td> <input type='tel' name='phn' value='".$row['phn']."'> </td>
         </tr>
          <tr>
            <td>Update Email</td>
             <td> <input type='email' name='email' value='".$row['email']."'> </td>
         </tr>
          <tr>
            <td>Update Office Address Line 1</td>
             <td> <input type='text' name='add1' value='".$row['add1']."'> </td>
         </tr>
          <tr>
            <td>Update Office Address Line 2</td>
             <td> <input type='text' name='add2' value='".$row['add2']."'> </td>
         </tr>
          <tr>
            <td>http://Youtube.com/</td>
             <td> <input type='text' name='yt' value='".$row['yt']."'> </td>
         </tr>
          <tr>
            <td>http://facebook.com/</td>
             <td> <input type='tel' name='fb' value='".$row['fb']."'> </td>
         </tr>
          <tr>
            <td>http://plus.google.com/</td>
             <td> <input type='tel' name='gp' value='".$row['gp']."'> </td>
         </tr>
          <tr>
            <td>http://Twitter.com/</td>
             <td> <input type='tel' name='tw' value='".$row['tw']."'> </td>
         </tr>
          <tr>
            <td>http://linkedin.com/</td>
             <td> <input type='tel' name='link' value='".$row['link']."'> </td>
         </tr>
     </table>
         
           <center><button name='up_con'>Save</button></center>
          </form>";
    
    if(isset($_POST['up_con']))
    {
        $phn=$_POST['phn'];
        $email=$_POST['email'];
        $add1=$_POST['add1'];
        $add2=$_POST['add2'];
        $yt=$_POST['yt'];
        $fb=$_POST['fb'];
        $gp=$_POST['gp'];
        $tw=$_POST['tw'];
        $link=$_POST['link'];
        
        $up=$con->prepare("update contact set phn='$phn', email='$email', add1='$add1', add2='$add2', yt='$yt', fb='$fb', gp='$gp', tw='$tw', link='$link'"); 
            if($up->execute())
            {
                echo"<script>windows.open('index.php?contact','_self')</script>";
            }
    }
        
}

?>
