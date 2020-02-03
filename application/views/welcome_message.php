<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajax Crud</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url();?>">Ajax Crud</a>
</nav>

<div class="container my-3"> 
	<div class="row mb-3"> 
	<div class="col-md-12"> 
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Add_User">
Add User
</button>
	</div>
</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody id="show_data">
    
  </tbody>
</table>

		</div>
	</div>

</div>

<!-- Button trigger modal -->


<!-- Add user -->
<!-- Modal -->
<form>
<div class="modal fade" id="Add_User" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo validation_errors(); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="name" id="name" name="name" placeholder="Name" class="form-control" id="exampleInputEmail1">
          <span id="name_error" class="text-danger"></span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" id="email" name="email" placeholder="Email" class="form-control" id="exampleInputPassword1">
          <span id="email_error" class="text-danger"></span>
        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" id="btn_save"  class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Add user End -->

<!-- Delete --> 
<form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <input type="hidden" name="user_id_delete" id="user_id_delete" class="form-control">
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>

<!-- Edit User --> 

 <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                              <input type="text" name="name_edit" id="name_edit" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="email" name="email_edit" id="email_edit" class="form-control" placeholder="Email">
                              <input type="hidden" name="user_id_edit" id="user_id_edit" class="form-control" placeholder="Email">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->




<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document ).ready(function() {
   show_User();  //call function show all product
   
   function show_User() {
     $.ajax({
        type:'ajax',
        url :'<?= base_url('Welcome/ShowUser');?>',
        async:false,
        dataType:'json',
        success:function (data) {
          var html = '';
          var i;
          var s=1;
            for (i=0; i<data.length; i++) {
              html +='<tr>'+
      '<th scope="row">'+s+++'</th>'+
      '<td>'+data[i].name+'</td>'+
      '<td>'+data[i].email+'</td>'+
      '<td>'+'<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-user_id="'+data[i].id+'" data-user_name="'+data[i].name+'" data-user_email="'+data[i].email+'">Edit</a>'+' '+'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-user_id="'+data[i].id+'">Delete</a>'+'</td>'+
    '</tr>';
            }
            $('#show_data').html(html);
        }
        // $('#show_data').html(html);

     });
   }
   // end show


   // add user 

   $('#error').html(" ");

   $('#btn_save').on('click',function(){
      // alert('asdf');
            var name = $('#name').val();
            var email = $('#email').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Welcome/save')?>",
                dataType : "JSON",
                data : {name:name , email:email},
                success: function(data){

                  if(data.error){

                     if(data.name_error != '')
                         {
                          $('#name_error').html(data.name_error);
                         }
                         else
                         {
                          $('#name_error').html('');
                         }

                     if(data.email_error != '')
                         {
                          $('#email_error').html(data.email_error);
                         }
                         else
                         {
                          $('#email_error').html('');
                         }

                  }
                  else{
                    $('[name="name"]').val("");
                    $('[name="email"]').val("");
                    $('#Add_User').modal('hide');
                    show_User();
                  }
                    
                    

                }
            });
            return false;
   });


   // Delete user
//get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var user_id = $(this).data('user_id');
              // alert(user_id);
            $('#Modal_Delete').modal('show');
            $('[name="user_id_delete"]').val(user_id);
        });

          //delete record to database
         $('#btn_delete').on('click',function(){
            var user_id = $('#user_id_delete').val();
            // alert(user_id);

            $.ajax({
                type : "POST",
                url  : '<?php echo base_url('')?>Welcome/delete/'+ user_id,
                dataType : "JSON",
                data : {user_id:user_id},
                success: function(data){
                  // console.log(data);
                    $('[name="user_id_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_User();
                }
            });
            return false;
        });

         // updata user 

         //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var name = $(this).data('user_name');
            var email = $(this).data('user_email');
            var id = $(this).data('user_id');
            

            $('#Modal_Edit').modal('show');
            $('[name="email_edit"]').val(email);
            $('[name="name_edit"]').val(name);
            $('[name="user_id_edit"]').val(id);
        });

         //update record to database
         $('#btn_update').on('click',function(){
            var name_u = $('#name_edit').val();
            var email_u = $('#email_edit').val();
            var id_u = $('#user_id_edit').val();

            // alert(name_u);
            // alert(email_u);

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Welcome/update')?>",
                dataType : "JSON",
                data : {name_u:name_u , email_u:email_u, id_u:id_u },
                success: function(data){
                  // alert(data);
                    $('[name="name"]').val("");
                    $('[name="email"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_User();
                }
            });
            return false;
        });

});
</script>
	
</body>
</html>