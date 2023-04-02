<?php $controller = new Controller\Admin\Blog\Posts();
      $posts = $controller->getPosts();
      $model = $controller->getModel();
?>
<div class="admin-posts">
    <div class="header-content">
        <h1>Posts</h1>
        <a href="<?= ADMIN_URL . '/post/addnew' ?>" class="add-new btn-add">Add New</a>
    </div>
    <table class="list-table col-sm-12">
        <thead>
            <th>ID</th>
            <th colspan="2">Title</th>
            <th>Thumbnail Image</th>
            <th>Status</th>
            <th>Create At</th>
            <th>Update At</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php if (!empty($posts)) :
         foreach($posts as $post) : ?>
            <tr>
                <td><?= $model->getID($post) ?></td>
                <td colspan="2"><?= $model->getTitle($post) ?></td>
                <td><?= $model->getThumbnailImage($post) ?></td>
                <td><?= $model->getStatus($post) ?></td>
                <td><?= $model->getCreateAt($post) ?></td>
                <td><?= $model->getUpdateAt($post) ?></td>
                <td><a href="#">Edit</a></td>
                <td><a href="<?= ADMIN_URL . 'post/delete?id='.$model->getID($post) ?>">Delete</a></td>
                <td><a href="<?= ADMIN_URL . 'post/edit?id='.$model->getID($post) ?>">Edit</a></td>
            </tr>
        <?php endforeach; else : ?>
            <tr>
                <td colspan="10" class="empty">
                    <span>No posts</span>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
