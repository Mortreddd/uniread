<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table of Authors</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
    <table class="table-fixed">
        <thead class="bg-slate-700 text-slate-50">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class='bg-slate-400'>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'><?php echo e($author->id); ?></td>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'><?php echo e($author->username); ?></td>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'><?php echo e($author->email); ?></td>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'><?php echo e($author->password); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\xampp\htdocs\uniread\resources\views/table.blade.php ENDPATH**/ ?>