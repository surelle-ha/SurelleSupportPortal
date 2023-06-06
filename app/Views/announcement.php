<?php 
$sql = "SELECT * FROM announcements_tb WHERE NOT JSON_CONTAINS(acknowledgeby, '\"".$_SESSION['id']."\"');";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) <= 0) { 
?>
<div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
    <div class="card-body py-0 px-0 px-sm-5">
        <div class="row align-items-center">
        <div class="col-4 col-sm-3 col-xl-2">
            <img src="images\illustration\empty_announcement.png" class="gradient-corona-img img-fluid" alt=""> <!-- https://icons8.com/illustrations/style--3d-casual-life -->
        </div>
        <div class="col-5 col-sm-7 col-xl-8 p-3">
            <h4 class="mb-1 mb-sm-0">Congratulations!</h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block text-justify">You don't have any announcement at this time. This means you can focus on other important tasks.
            Remember, not having any announcement is a cause for celebration, so enjoy the moment and make the most of your free
            time!</p>
        </div>
        </div>
    </div>
    </div>
</div>

<?php } else { 
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
?>

<div class="preview-item border-bottom">
    <div class="preview-thumbnail">
    <img src="https://cdn-icons-png.flaticon.com/512/326/326031.png" alt="image" class="rounded-circle" />
    </div>
    <div class="preview-item-content d-flex flex-grow">
    <div class="flex-grow">
        <div class="d-flex d-md-block d-xl-flex justify-content-between">
        <h6 class="preview-subject"><?php echo $row['author']; ?><code style="font-size: 11px;"><?php echo $row['id']; ?></code></h6>
        <p class="text-muted text-small"><?php echo $row['timedate']; ?></p>
        </div>
        <p class="text-justify text-muted"><?php echo $row['message']; ?></p>
        <form method="post">
        <input type="hidden" name="announcement_acknowledge" value='<?php echo $row['id']; ?>'>
        <input type="submit" class="btn btn-primary mr-2 float-right" value="Acknowledge">
        </form>
    </div>
    </div>
</div>

<?php
    }
}
} 
?>