<?php $title = 'ChingYi P.C | Personal Blog | Dashboard'; ?>
<?php ob_start(); ?>
<!--Post-->
<h2 class="mb-3 m-1 admin-title" id="posts">Posts <button type="button" class="btn btn-sm button2">New Post</button></h2>
<div class="table-responsive table-bordered m-1 mb-3">
    <table class="table table-hover blogtext  " id="posts"">
    <thead>
      <tr>
        <th scope=" col">#ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Category</th>
        <th scope="col">Created Date</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td class="tabled">Madffddffdrk</td>
                <td class="tabled">Otfdfdfdfdfd fcccc ccccccddd dddd dddd ddddfdfd scc ccccc cccc cccc ssfd fdfdfddft</td>
                <td>Madffddffdrk</td>
                <td>01/01/2121</td>
                <td>
                    <button type="button" class="btn btn-sm button2 m-1" href="readpost.php">View</button>
                    <button type="button" class="btn btn-sm button2 m-1">Edit</button>
                    <button type="button" class="btn  btn-sm btn-danger m-1">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!--comments-->
<h2 class="mb-3 m-1  admin-title" id="comments">Comments</h2>
<div class="card m-1 mb-3">
    <p class="card-text m-1">djkldfkjf mlds ldsml dfsklflk dsmldsmln sdkljds dskljds</p>
    <div class="card-footer d-flex justify-content-between">
        <span class="fs-6 m-1"><i class="fas fa-user"> </i>ffdgfs</span>
        <span class="fs-6 m-1">04/05/2021 10:12pm</span>
        <span class="fs-6 m-1">pending</span>
        <span class="fs-6 m-1 ">
            <button type="button" class="btn btn-sm button2">Valid</button>
            <button type="button" class="btn btn-sm btn-danger">Delete</button></span>
    </div>
</div>
<!--users-->
<h2 class="mb-3 m-1 admin-title" id="users">Users</h2>
<div class="table-responsive table-bordered m-1 mb-3">
    <table class="table table-hover blogtext  " id="posts"">
    <tread>
      <tr>
        <th scope=" col">#ID</th>
        <th scope="col">Role</th>
        <th scope="col">Username</th>
        <th scope="col">Email address</th>
        <th scope="col">Created Date</th>
        <th scope="col">Action</th>
        </tr>
        </tread>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Madffddffdrk</td>
                <td>Madffddffdrk</td>
                <td>Otfdfdfdfdfdfdfdfdfdfdfdfdfdfddfto</td>
                <td>01/01/2121</td>
                <td>
                    <button type="button" class="btn btn-sm button2 m-1" href="readpost.php">View</button>
                    <button type="button" class="btn btn-sm button2 m-1" href="updatepost.php">Edit</button>
                    <button type="button" class="btn btn-sm btn-danger m-1">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>


</div>

<?php $content = ob_get_clean(); ?>

<?php require('src/views/backend/_backendLayout.php'); ?>