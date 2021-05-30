<br><div class="card bg-light ">
  <div class="card-body">
     <div class="row">
       <div class="col-md-10">
         <!-- <h3> <?=$function_title?> </h3> -->
       </div>
       <div class="col-md-2">
         <!--  <a href="<?= base_url() ?>node/add" class="btn btn-sm btn-primary btn-block float-right">Add Node</a> -->
       </div>
     </div>
    <br>
    <div class="row">
     <div class="col-md-12">
       <form action="<?= base_url() ?>schyear/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
                     <div class="row">
                       <div class="col-md-6 offset-md-3">
                         <div class="form-group">
                           <label for="schyear">School Year</label>
                           <input name="schyear" type="text"  autocomplete="off" value="<?= isset($rec['schyear']) ? $rec['schyear'] : set_value('schyear') ?>" class="form-control <?= isset($errors['schyear']) ? 'is-invalid':' ' ?>" id="schyear" placeholder="School Year">
                             <?php if($errors['schyear']): ?>
                               <div class="invalid-feedback">
                                 <?= $errors['schyear'] ?>
                               </div>
                             <?php endif; ?>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6 offset-md-3">
                         <button type="submit" class="btn btn-primary float-right">Submit</button>
                       </div>
                     </div>
                   </form>
                   <p style="clear: both"></p>
                 </div>
                </div>
