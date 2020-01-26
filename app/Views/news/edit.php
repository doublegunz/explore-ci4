 <div class="container mt-5">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <?php echo $title; ?>
                 </div>
                 <div class="card-body">

                     <?php if (session()->getFlashdata('success')) { ?>
                         <div class="alert alert-success">
                             <?php echo session()->getFlashdata('success'); ?>
                         </div>
                     <?php } ?>

                     <?php if (session()->getFlashdata('error')) { ?>
                         <div class="alert alert-danger">
                             <?php echo session()->getFlashdata('error'); ?>
                         </div>
                     <?php } ?>


                     <?php echo form_open('news/update/' . $news['id']); ?>

                     <div class="form-group">
                         <label for="title">Title</label>
                         <input type="text" name="title" value="<?php echo $news['title'];?>" class="form-control" required>
                     </div>

                     <div class="form-group">
                         <label for="body">Body</label>
                         <textarea name="body" id="" cols="30" rows="10" class="form-control" required><?php echo $news['body'];?></textarea>
                     </div>

                     <div class="form-group">
                         <button class="btn btn-primary" type="submit">Save Changes</button>
                         <a href="<?php echo base_url('news'); ?>" class="btn btn-secondary">Back</a>
                     </div>

                     <?php echo form_close(); ?>

                 </div>

             </div>
         </div>
     </div>
 </div>