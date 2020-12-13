<?php
include 'model/Class_.php';
include 'model/User.php';
$class = new Class_();
$user = new User();
if ($_SESSION['isLogin']['role'] == 'admin')
    $rs = $class->getAll();
else
    $rs = $class->getByAuthor($_SESSION['isLogin']['id']);
?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Subject</th>
        <th>Room</th>
        <?php if ($_SESSION['isLogin']['role'] == 'admin'): ?>
            <th>Author</th>
        <?php endif; ?>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($rs)) : ?>
        <?php foreach ($rs as $item) : ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><img src="uploads/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="100px"></td>
                <td><?= $item['subject'] ?></td>
                <td><?= $item['room'] ?></td>
                <?php if ($_SESSION['isLogin']['role'] == 'admin'): ?>
                    <td>
                        <?= $user->getUserById($item['author'])['fullname'] ?>
                    </td>
                <?php endif; ?>
                <td style="max-width: 50px">
                    <button type="button" class="btn btn-secondary btn-sm btn-class-delete" data-id="<?= $item['id'] ?>">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm btn-class-edit" data-id="<?= $item['id'] ?>">Edit</button>
                    <button type="button" class="btn btn-secondary btn-sm btn-redirect-class" data-id="<?= $item['id'] ?>">View</button>
                </td>
            </tr>
        <?php endforeach;
    endif; ?>
    </tbody>
</table>
