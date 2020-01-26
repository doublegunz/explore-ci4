<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    NEWS LIST
                    <a href="<?php echo site_url('news/create'); ?>" class="btn btn-primary btn-sm float-right">New Record</a>
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



                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($news) && is_array($news)) { ?>
                                <?php foreach ($news as $row) { ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['slug']; ?></td>
                                        <td><?php echo substr($row['body'], 0, 30); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('news/edit/' . $row['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?php echo base_url('news/delete/' . $row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('kamu yakin?');">Delete</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">Data News Kosong.</td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <?= $pager->links(); ?>
                </div>

            </div>
        </div>
    </div>
</div>