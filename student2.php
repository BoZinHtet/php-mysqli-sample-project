<?php 

// session_start();

require 'link.php';

include 'header.php';

require 'sidebar.php';

 ?>

 <div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> MySQL STUDENT</a></div>
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
  	
  	<form action="task.php" method="POST" enctype="multipart/form-data">
  		<div class="">
  		<label for="name">Name</label>
  		<input type="text" name="name" id="name" required="" class="">
  		</div>
  		<div class="form-group">
  		<label for="roll">Roll No</label>
  		<input type="text" name="roll" id="roll" required="" class="form-control">
  		</div>
  		<div class="form-group">
  		<label for="phone">Phone</label>
  		<input type="text" name="phone" id="phone" required="" class="form-control">
  		</div>
  		<div class="form-group">
  		<label for="father">Father Name</label>
  		<input type="text" name="fathername" id="fathername" required="" class="form-control">
  		</div>
  		<div class="form-group">
  		<label for="photo">Photo</label>
  		<input type="file" name="photo" id="photo" required="">
  		</div>
  		<div class="form-group">
  			<button class="btn btn-success" name="add">Save</button>
  		</div>
  	</form>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Phone</th>
            <th>Father Name</th>
            <th>Photo</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
          <?php 

            require 'conn.php';

            $sql = "SELECT * FROM student ORDER BY id DESC";
            $res = $conn->query($sql);

            // print_r($res ->fetch_array());
            // $res ->fetch_object();
            // $res ->fetch_array() -> $row[0] $row['id'];
            // $res ->fetch_all();
            // $res ->fetch_row();$row[0];
            // $res ->fetch_assoc()->$row['id'];

            $i=0;

            // while ($row=$res->fetch_object()) {
            //  $id=$row->id;
            //  $name=$row->name;
            //  $roll=$row->roll;
            //  $phone=$row->phone;
            //  $fathername=$row->father_name;
            //  $photo=$row->photo;
            //  $i++;
            while ($row=$res->fetch_array()) {
             $id=$row['id'];
             $name=$row['name'];
             $roll=$row['roll'];
             $phone=$row['phone'];
             $fathername=$row['father_name'];
             $photo=$row['photo'];
             $i++;

             echo "<tr>
                    <td>$i</td>
                    <td>$name</td>
                    <td>$roll</td>
                    <td>$phone</td>
                    <td>$fathername</td>
                    <td>
                      <img src='$photo' class='img-responsive' width='100'>
                    </td>
                    <td>
                      <button class='btn btn-info' onclick='getEdit($id)'>Update</button>
                    </td>
                    <td>
                      <a href='delete.php?deleteid=$id' class='btn btn-danger'>Delete</a>
                    </td>
                  </tr>";
            }

           ?>
        </tbody>
        
      </table>
    </div>
  </div>

</div>

<!-- #end content -->

<script type="text/javascript">
  
  function getEdit(id){
   
    $.ajax({
      url:'edit.php',
      type:'post',
      data:{'editid':id},
      dataType:'json',
      success:function(data){
        console.log(data);
        $('#id').val(data.id);
        $('#name1').val(data.name);
        $('#roll1').val(data.roll);
        $('#phone1').val(data.phone);
        $('#fathername1').val(data.father_name);
        $('#oldphoto').val(data.photo);
        $('#editmodal').modal({backdrop:'static',keyboard:false});
      },
      error:function(err){
        console.log(err);
      }
    })
  }
</script>

<div class="modal fade" id="editmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Update Student</h1>
      </div>
      <div class="modal-body">

      <form action="task.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="old" id="oldphoto">

        <div class="form-group">
          <label for="name1">Name</label>
          <input type="text" name="name" id="name1" required="" class="form-control">
        </div>
        <div class="form-group">
          <label for="roll1">Roll No</label>
          <input type="text" name="roll" id="roll1" required="" class="form-control">
        </div>
        <div class="form-group">
          <label for="phone1">Phone</label>
          <input type="text" name="phone" id="phone1" required="" class="form-control">
        </div>
        <div class="form-group">
          <label for="fathername1">Father Name</label>
          <input type="text" name="fathername" id="fathername1" required="" class="form-control">
        </div>
        <div class="form-group">
          <label for="photo1">Photo</label>
          <input type="file" name="photo" id="photo1">
        </div>
        <div class="form-group">
          <button class="btn btn-success" name="update">Save</button>
        </div>
    </form>

      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php 
  $a="https://www.facebook.com";
  $b="https://www.google.com";
  $c="https://twitter.com";
 ?>
<a href="<?php echo $a ?>"> FAcEBOOK</a>
<a href="<?php echo $b ?>"> GOOGLE</a>
<a href="<?php echo $c ?>"> Twitter</a>
<?php 
  require 'footerscript.php'
 ?>

</body>
</html>