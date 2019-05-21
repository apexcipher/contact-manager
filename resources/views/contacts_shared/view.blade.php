@include('includes.navigation');
<div class="container">

   <div class="container">

 <div class="row">
  <div class="col-xs-12 col-md-10 well">
   first_name  :  <?php echo $user_contacts->first_name ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   middle_name  :  <?php echo $user_contacts->middle_name ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   last_name  :  <?php echo $user_contacts->last_name ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   primary_phone  :  <?php echo $user_contacts->primary_phone ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   secondary_phone  :  <?php echo $user_contacts->secondary_phone ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   email_id  :  <?php echo $user_contacts->email_id ?>
  </div>
</div>

</div>
</div>
@include('includes.footer');
