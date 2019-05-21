
@include('includes.navigation');


<div class="container">

 <div class="row">
  <div class="col-xs-12 col-md-10 well">
   first_name  :  <?php echo $users->first_name ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   last_name  :  <?php echo $users->last_name ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   email  :  <?php echo $users->email ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   gender  :  <?php echo $users->gender ?>
  </div>
</div>

</div>
@include('includes.footer');
