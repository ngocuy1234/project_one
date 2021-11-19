
<?php $__env->startSection('title', 'Khóa học'); ?>
<?php $__env->startSection('main_content'); ?>
<main class="bgr-light" style="margin-top: 80px;">
    <div class="learning-section">
        <div class="container-fluid">
            <div class="learning-fluid">
                <div class="learning-space">
                    <div class="learning__video" style="margin-bottom: 20px;">
                        <?php if(isset($lessonFist)): ?>
                        <iframe width="98%" height="520" src="https://www.youtube.com/embed/<?php echo e($lessonFist['lesson_link']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                        <h2 style="font-size: 20px;text-align:center;margin-top:15px"><?php echo e($lessonFist['lesson_name']); ?></h2>
                        <?php endif; ?>
                        <!-- </video> -->
                    </div>
                    <div class="learning-tabs">
                        <div class="btn-tab">
                            <button class="tablinks" id="defaultOpen" onclick="openTabAction(event, 'comment-lesson')">Bình Luận</button>
                            <button class="tablinks" onclick="openTabAction(event, 'note-lesson')">Ghi chú</button>
                        </div>
                        <div id="comment-lesson" class="tab-content">
                            <div class="count-comment">
                                <?php if(!empty($dataComment)): ?>
                                <span style="color: #444;">Hiện có <?php echo count($dataComment) ?> bình luận</span>
                                <?php else: ?>
                                <span style="color: #444;">Chưa có bình luận nào !</span>
                                <?php endif; ?>
                            </div>
                            <div class="form-comment-input ">
                                <div class="comment-img">
                                    <img src="./public/img/<?php echo e($userInfo['student_avatar']); ?>" alt="" class="img-fluid">
                                </div>
                                <form method="POST" action="binh-luan-bai-hoc?student_id=<?php echo e($userInfo['student_id']); ?>">
                                    <input type="text" name="comment_content" placeholder="Bạn có thắc mắc gì trong bài học này?">
                                    <button type="submit" class="btn btn-comment">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="comment-list">
                                <?php $__currentLoopData = $dataComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="comment-item">
                                    <div class="comment-img comment-img--acc ">
                                        <img src="./public/img/<?php echo e($key['student_avatar']); ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="comment-text">
                                        <span class="comment-item__name">
                                            <?php echo e($key['student_name']); ?>

                                        </span>
                                        <span class="comment-item__date" style="margin-left: 30px;">
                                            <?php echo e($key['date_cmtt']); ?>

                                        </span>
                                        <p class="comment-item__content">
                                            <?php echo e($key['comment_content']); ?>

                                        </p>
                                    </div>
                                    <?php if($userInfo['student_id'] == $key['student_id']): ?>
                                    <div class="action-ctrl">
                                        <button class="item-ctrl-btn"><a class="delete_cmtt" data-id="<?php echo e($key['cmtt_id']); ?>" href=""><i class="fas fa-trash"></i></a></button>
                                        <button class="item-ctrl-btn"><a href=""><i class="fas fa-pen"></i></a></button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div id="note-lesson" class="tab-content" style="margin-left: -70px;">
                            <form class="form__note" action="" method="POST">
                                <label class="form__note__title" for="">Tạo ghi chú mới</label>
                                <div class="note-section-content">
                                    <input class="input__time-note" type="text" placeholder="Thời gian">
                                    <textarea style="border-radius: 15px;padding:10px;font-size:18px" placeholder="Nội dung ghi chú" name="banner_text" onkeyup="banner_textt()" id="banner_text" cols="70" rows="6"></textarea>
                                    <button type="submit" class="btn btn-note">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="note-lesson-list">
                                <div class="note-lesson-item">
                                    <span class="">
                                    </span>
                                    <div class="note-text-container">
                                        <span class="lesson-title">Bài 1: Làm quen js</span>
                                        <p class="note-content">
                                            Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay
                                            Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay Tips hay
                                        </p>
                                    </div>
                                    <div class="action-ctrl note-item-ctrl">
                                        <button class="item-ctrl-btn">
                                            <a href=""><i class="fas fa-pencil-alt"></i></a>
                                        </button>
                                        <button class="item-ctrl-btn">
                                            <a href=""><i class="fas fa-trash"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="play-list">
                    <h3 class="course__title" style="font-size: 23px;margin-top:-10px">
                        Khóa học <?php echo e($subjectName); ?>

                    </h3>
                    <?php
                    $index = 1;
                    ?>
                    <div class="lesson-list">
                        <?php $__currentLoopData = $dataLesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="lesson-item">
                            <a href="bai-hoc?mon=<?php echo e($subject_slug); ?>&bai=<?php echo e($key['lesson_slug']); ?>" class="lesson-item-info">
                                <span class="lesson__index" style="margin-top: 10px;margin-left:5px"><i class="fas fa-play-circle"></i></span>
                                <h4 class="lesson-item__title" style="line-height: 1.4;">
                                    Bài <?= $index++ ?>: <?php echo e($key['lesson_name']); ?>

                                </h4>
                                <span class="lesson__time">
                                    10:10
                                </span>
                            </a>
                            <div class="lesson-item-test">
                                <a href="" class="test_index">
                                    1
                                </a>
                                <a href="" class="test_index">
                                    2
                                </a>
                                <a href="" class="test_index">
                                    3
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
<script src="./public/js/customerJs/tablinks.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.delete_cmtt').click(function(e) {
            e.preventDefault();
            var cmtt_id = $(this).data('id');
            $.get("xoa-binh-luan", {
                cmtt_id: cmtt_id
            }, function($data) {
                $('.comment-list').html($data);
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\project_one\app\views/customer/learning.blade.php ENDPATH**/ ?>