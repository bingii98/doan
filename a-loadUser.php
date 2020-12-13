<?php
include 'model/User.php';
$user = new User();
$rs = $user->getAll();
?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Full name</th>
        <th>Role</th>
        <th>Birthday</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($rs)) : ?>
        <?php foreach ($rs as $item) : ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['fullname'] ?></td>
                <td>
                    <select class="role-value">
                        <option value="admin" <?= $item['role'] == 'admin' ? 'selected' : ''?>>Admin</option>
                        <option value="teacher" <?= $item['role'] == 'teacher' ? 'selected' : ''?>>Teacher</option>
                        <option value="student" <?= $item['role'] == 'user' ? 'selected' : ''?>>Student</option>
                    </select>
                </td>
                <td><?= $item['dateofbirth'] ?></td>
                <td><?= $item['tel'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['username'] ?></td>
                <td>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm btn-user-role mb-1" data-id="<?= $item['id'] ?>">Change role</button>
                    <br>
                    <button type="button" class="btn btn-secondary btn-sm btn-user-delete" data-id="<?= $item['id'] ?>">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm btn-user-edit" data-id="<?= $item['id'] ?>">Edit</button>
                </td>
            </tr>
        <?php endforeach;
    endif; ?>
    </tbody>
</table>
