<div id="bodyright">
  <?php if(isset($_GET['edit_term'])){
    echo edit_term();
}else {?>
   <h3>OverView Term</h3>
   <div id="add">
      <details>
          <summary>Add NEW T&C</summary>
       <form method="post" enctype="multipart/form-data">
         <select name="for_whome" required >
             <option value="">Select Tearm for</option>
             <option value="Student">Student</option>
             <option value="Teacher">Teacher</option>
             
         </select>
          <input type="text" name="term" placeholder="Enter Term Name Here"> 
           <center><button name="add_term">Add T&C </button></center>
          </form>
       </details>
        <table style="width:98%" cellspacing="0">
           <tr>
               <th>Sr No.</th>
               <th>Terms</th>
               <th>For Whome</th>
               <th>Action</th>
           </tr>
           <?php echo view_term(); ?>
       </table>
   </div>
    <?php }?>
</div>


<?php echo add_term(); ?>