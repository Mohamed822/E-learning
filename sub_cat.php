<div id="bodyright">
  <?php if(isset($_GET['edit_sub_cat']))
{
    echo edit_sub_cat();
}
    else
    {
        
    
    ?>
  
   <h3>OverView All category</h3>
   <div id="add">
      <details>
      <summary>Add sub category</summary>
       <form method="post" enctype="multipart/form-data">
         <select name="cat_id" id="">
             <option value="">select category</option>
             <?php echo select_cat(); ?>
         </select>
          <input type="text" name="sub_cat_name" placeholder="Enter Category Name Here"> 
           <center><button name="add_sub_cat">Add sub category</button></center>
       </form>
       </details>
       
       <table cellspacing="0">
           <tr>
               <th>Sr No.</th>
               <th> sub Category Name</th>
               <th>Main category Name</th>
               <th>Action</th>
              
           </tr>
           <?php echo view_sub_cat(); ?>
       </table>
   </div>
    <?php }?>
</div>


<?php echo add_sub_cat(); ?>