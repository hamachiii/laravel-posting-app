<?php $__env->startSection('title', '投稿詳細'); ?>

<?php $__env->startSection('content'); ?>
  <?php if(session('flash_message')): ?>
    <p class="text-success"><?php echo e(session('flash_message')); ?></p>
  <?php endif; ?>

  <div class="mb-2">
    <a href="<?php echo e(route('posts.index')); ?>" class="text-decoration-none">&lt; 戻る</a>
  </div>

  <article>
    <div class="card mb-3">
      <div class="card-body">
        <h2 class="card-title fs-5"><?php echo e($post->title); ?></h2>
        <p class="card-text"><?php echo e($post->content); ?></p>
        <p><?php echo e($post->updated_at); ?></p>

        <?php if($post->user_id === Auth::id()): ?>
          <div class="d-flex">
            <a href="<?php echo e(route('posts.edit', $post)); ?>" class="btn btn-outline-primary d-block me-1">編集</a>

            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" onsubmit="return confirm('本当に削除してもよろしいですか？');">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-outline-danger">削除</button>
            </form>
          </div> 
        <?php endif; ?> 
      </div>
    </div>
  </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel-posting-app/resources/views/posts/show.blade.php ENDPATH**/ ?>