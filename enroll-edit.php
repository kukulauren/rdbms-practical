<?php require("./template/header.php"); ?>
<?php include("./template/sidebar.php"); ?>

<section class=" bg-gray-100 p-10 rounded-lg">

    <ol class="flex items-center whitespace-nowrap " aria-label="Breadcrumb">

        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="./batch-list.php">
                Manage Student
                <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </a>
        </li>

        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
            Enrollment
        </li>
    </ol>

    <hr class="  border-gray-300 my-4">

 <?php
    $id=$_GET["row_id"];
    $sql = "SELECT enrollments.id as enrollments_id, students.name as student_name,batches.name as batch_name,batches.id as batch_id,enrollments.created_at as enroll_created FROM enrollments LEFT JOIN students ON enrollments.student_id=students.id LEFT JOIN batches ON enrollments.batch_id=batches.id WHERE enrollments.id=$id ";
    $query = mysqli_query($conn, $sql);
    $enroll = mysqli_fetch_assoc($query);
    $batchSql = "SELECT * FROM batches";

    $batchQuery = mysqli_query($conn, $batchSql);

 ?>
    <form action="./enroll-update.php" method="post">
        <div class=" flex flex-col w-1/2 gap-3 mb-8">
            <div class="">
                <h3 class="  text-lg">
                   Student- <b><?= $enroll['student_name'] ?></b> 
                </h3>
            </div>
                <input type="hidden" name="row_id" value="<?= $enroll['enrollments_id'] ?>">

            <div class="">
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Select Batch</label>
                <select name="batch_id" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 sm:p-4">
                    <option selected>Open this select menu</option>
                    <?php
                    
                    while ($row = mysqli_fetch_assoc($batchQuery)) :
                        

                    ?>
                        <option value="<?= $row["id"]; ?>"  <?= $enroll['batch_id'] == $row['id'] ? 'selected' : '' ?> ><?= $row["name"]; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <button type="submit" class="py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Update Enroll
            </button>


        </div>
    </form>








</section>



<?php include("./template/footer.php"); ?>