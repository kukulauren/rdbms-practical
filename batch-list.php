<?php require("./template/header.php"); ?>
<?php include("./template/sidebar.php"); ?>

<section class=" bg-gray-100 p-10 rounded-lg">

    <ol class="flex items-center whitespace-nowrap " aria-label="Breadcrumb">


        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
            Manage Batches
        </li>
    </ol>

    <hr class="  border-gray-300 my-4">


    <div class=" flex justify-between">
        <a href="./batch-create.php" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Open Batch</a>
    </div>

    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Batch Name</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Course</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Start Date</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Time</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Register</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Student Limit</th>
                                <th class="px-6 py-3 text-end  text-xs font-medium text-gray-500 uppercase">Created</th>
                                <th class="px-6 py-3 text-end  text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // sql statement
                            $sql = "SELECT *,batches.id as batch_id,(SELECT COUNT(id) FROM enrollments WHERE batches.id=enrollments.batch_id ) as student_count FROM batches LEFT JOIN courses ON courses.id = batches.course_id";

                            // run query
                            $query = mysqli_query($conn, $sql);

                            // print_r(mysqli_fetch_assoc($query));

                            // die();


                            while ($row = mysqli_fetch_assoc($query)) :

                            ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?= $row['batch_id'] ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?= $row['name'] ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium text-gray-800 dark:text-gray-200" title="<?= $row['title'] ?>"><?= $row['short'] ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium text-gray-800 dark:text-gray-200">
                                        <?= date("d M Y", strtotime($row['start_date'])) ?>

                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium text-gray-800 dark:text-gray-200">
                                        <?= date("gA", strtotime($row['start_time'])) ?> -
                                        <?= date("gA", strtotime($row['end_time'])) ?>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium text-gray-800 dark:text-gray-200">
                                        <?php if ($row['is_register_open']) : ?>
                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">Open</span>
                                        <?php else : ?>
                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500">Close</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium text-gray-800 dark:text-gray-200">  <?= $row['student_count'] ?> "/" <?= $row['student_limit'] ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium text-gray-800 dark:text-gray-200">
                                        <?= date("d M Y", strtotime($row['created_at'])) ?>
                                        <br>
                                        <?= date("h : i A", strtotime($row['created_at'])) ?>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium text-gray-800 dark:text-gray-200">


                                        <div class="inline-flex rounded-lg shadow-sm">



                                            <a class="py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="./batch-edit.php?row_id=<?= $row['batch_id'] ?>">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>



                                            </a>
                                            <a class="py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" onclick="return confirm('Are you sure to delete?')" href="./batch-delete.php?row_id=<?= $row['batch_id'] ?>">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-red-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>


                                            </a>
                                        </div>



                                    </td>
                                </tr>

                            <?php endwhile ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>







</section>



<?php include("./template/footer.php"); ?>