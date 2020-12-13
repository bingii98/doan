<?php
if (!isset($_SESSION))
    session_start();

include 'model/Class_.php';
include 'model/User.php';
include 'model/Comment.php';

$class = new Class_();
$user = new User();
$comment = new Comment();

$c = $class->get($_POST['id']);

if (!empty($c)) : ?>
    <?php
    $_SESSION['class_join']['id'] = $_POST['id'];
    $t = $user->getUserById($c['author']);
    if ($_SESSION['isLogin']['role'] == 'user' && !$class->getStudentInClass($_SESSION['isLogin']['id'], $_POST['id'])) {
        $class->insertStudenttoClass($_SESSION['isLogin']['id'], $_POST['id']);
    }

    $s = $class->getListStudent($c['id']);
    $arr_comment = $comment->getByClass($c['id']);
    ?>
    <div class="handle-room">
        <div class="form-class">
            <div class="sidebar">
                <div class="header-info-class">
                    <div class="image-thumbnail">
                        <h3 class="title">Class: <span> <?= $c['name'] ?></span></h3>
                        <img src="uploads/<?= $c['image'] ?>" alt="">
                    </div>
                    <div class="info">
                        <p class="title"><i>ID: <span><?= $c['id'] ?></span></i></p>
                        <p class="title"><i>Subject: <span><?= $c['subject'] ?></span></i></p>
                        <p class="title"><i>Room: <span> <?= $c['room'] ?></span></i></p>
                        <a href="leaveClass.php">Leave Class</a>
                    </div>
                </div>
                <?php if ($_SESSION['isLogin']['role'] == 'admin' || $_SESSION['isLogin']['role'] == 'teacher'): ?>
                    <button class="btn btn-primary">Create assignment</button>
                <?php endif; ?>
                <h4>Teacher</h4>
                <ul class="teacher">
                    <li>
                        <span class="avatar"><img src="assets/img/generic-avatar.jpg" alt=""></span>
                        <p><?= $t['fullname'] ?></p>
                    </li>
                </ul>
                <h4>Student</h4>
                <ul class="student">
                    <?php if (!empty($s)) :
                        foreach ($s as $item) : ?>
                            <?php $u = $user->getUserById($item["idUser"]) ?>
                            <li>
                                <span class="avatar"><img src="assets/img/generic-avatar.jpg" alt=""></span>
                                <p><?= $u['fullname'] ?>
                                    <time><?= $item['time'] ?></time>
                                </p>
                                <?php if ($_SESSION['isLogin']['role'] == 'admin' || $_SESSION['isLogin']['role'] == 'teacher'): ?>
                                    <div class="menu-user">
                                        <button class="btn btn-secondary btn-sm btn-remove-student"
                                                data-id="<?= $u['id'] ?>" data-class="<?= $_POST['id'] ?>">x
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php
                        endforeach;
                    else: ?>
                        <p>Nothing to show</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="editor-box">
            <label for="txt-content">Comment</label>
            <textarea name="text_content" id="txt-content-comment"></textarea>
            <button class="btn btn-primary" id="btn-create-comment" data-id="<?= $c['id'] ?>" data-parent="0">Submit
            </button>
        </div>
        <div class="list-comment">
            <?php if ($arr_comment) : ?>
                <?php foreach ($arr_comment as $item) : ?>
                    <div class="archive-comment">
                        <div class="comment-wrapper">
                            <div class="user-info">
                                <div class="avt">
                                    <img src="assets/img/generic-avatar.jpg" alt="Avatar">
                                </div>
                                <div class="headline">
                                    <p class="name"><?= $user->getUserById($item["idUser"])['fullname'] ?></p>
                                    <time><?= $item['time'] ?></time>
                                </div>
                            </div>
                            <div class="content">
                                <?= $item['content'] ?>
                            </div>
                            <div class="reply-wrapper">

                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary btn-reply">Reply</button>
                        <div class="editor-box">
                            <label for="txt-content">Comment</label>
                            <textarea name="text_content txt-content-comment-reply"></textarea>
                            <button class="btn btn-primary btn-sm btn-create-comment-reply" data-id="<?= $c['id'] ?>"
                                    data-parent="<?= $item['id'] ?>">Submit
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
