<br><br><br><br>
<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php $user = $this->session->userdata('user_id'); 
    if($user != 3){
        redirect('home');
    }
?>

<?php echo form_open('users/register'); ?>

<div class="form-group">
    <label>IMe</label>
    <input type="text" name="name" class="form-control" placeholder="Unesit ime">
</div>
<div class="form-group">
    <label>Korisnicko ime</label>
    <input type="text" name="username" class="form-control" placeholder="Unesit Korisnicko ime">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Unesit email">
</div>
<div class="form-group">
    <label>Lozinka</label>
    <input type="password" name="password" class="form-control" placeholder="Unesit lozinku">
</div>
<div class="form-group">
    <label>Ponovljena lozinka</label>
    <input type="password" name="password2" class="form-control" placeholder="Ponovite lozinku">
</div>
<button class="btn btn-primary" type="submit">Submit</button>
<?php echo form_close(); ?>