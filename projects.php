<?php 
include_once("includes/header.php");
include_once("includes/navbar.php");
?>
<div class="container">
  <div class="row">
    <?php
   require 'config/dbcon.php';
    $query = "SELECT id, url FROM projects";
    $result = mysqli_query($con, $query);

    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $url = $row['url'];
        ?>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Website Card</h5>
              <div class="website-content">
                <iframe src="<?php echo $url; ?>" frameborder="0"></iframe>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    } else {
      echo "Error executing the database query.";
    }

    
    mysqli_close($con);
    ?>
  </div>
</div>

<style>
    body{
    background:#eee;
    }

  .card {
    width: 400px;
    height: 600px;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
    margin-top: 40px;
    margin-bottom: 40px;
  }

  .card .card-body {
    padding: 10px;
  }

  .card .card-title {
    margin-bottom: 10px;
  }

  .card .website-content {
    width: 100%;
    height: 100%;
  }

  .card .website-content iframe {
    width: 100%;
    height: 100%;
    border: 0;
  }
</style>


 
<?php
include("includes/footer.php");
?>
