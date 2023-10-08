<div class="relative overflow-hidden">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Book ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Collaborative
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    <?php echo e($book->id); ?>

                </td>
                <td class="px-6 py-4">
                    <?php echo e($book->title); ?>

                </td>
                <td class="px-6 py-4">
                    <?php echo e($book->genre); ?>

                </td>
                <td class="px-6 py-4">
                    <?php echo e($book->description); ?>

                </td>
                <td class="px-6 py-4">
                    <?php echo e($book->collaborative); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
    <?php /**PATH C:\xampp\htdocs\uniread\resources\views/components/genreTable.blade.php ENDPATH**/ ?>