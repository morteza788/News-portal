<?php
require_once("resources/view/admin/layouts/header.php");
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5 "><i class="fas fa-newspaper"></i> Articles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="<?= url('admin/article/create') ?>" class="btn btn-sm btn-success">create</a>
    </div>
</div>
<?= success('success') ?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of articles</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>summary</th>
                <th>view</th>
                <th>user ID</th>
                <th>cat ID</th>
                <th>image</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td><?= $article['id'] ?></a></td>
                <td><?= $article['title'] ?></td>
                <td><?= $article['summary'] ?></td>
                <td><?= $article['view'] ?></td>
                <td><?= $article['user_id'] ?></td>
                <td><?= $article['cat_id'] ?></td>
                <td><img style="width: 80px;" src="<?= asset($article['image']) ?>"
                         alt=""></td>
                <td>
                <td>
                    <a role="button" class="btn btn-sm btn-primary text-white"
                       href="<?= url('admin/article/edit/'.$article['id']) ?>">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white"
                       href="<?= url('admin/article/destroy/'.$article['id']) ?>">delete</a>
                </td>
            </tr>
    <?php } ?>
        </tbody>

    </table>
</div>



<?php
require_once("resources/view/admin/layouts/footer.php");
?>
