<!DOCTYPE html>
<html lang="en" dir="rtl" lang="fa">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <title>Home</title>
  </head>
  <body>
    <?php
      include "../../configs/DBConfig.php";
      $query = "SELECT * FROM parks";
        $parks = $db->query($query);
    ?>
    <!-- navbar setion strnatcasecmp -->

  <div>

<div class="card-deck">
  <?php if ($parks->rowCount() > 0) : ?>
      <?php foreach ($parks as $park) : ?>
  <div class="card">
    <img class="card-img-top" src=<?="../../assets/images/parks/".$park['english_name']."/".$park['image'].".jpg"?> alt=<?=$park['image']?>>
    <div class="card-body">
      <h5 class="card-title"><?=$park['name']?></h5>
      <p class="card-text"><?=$park['address']?></p>
    </div>
    <?php endforeach ?>
    <p>محتوایی موجود نیست</p>
                <?php endif ?>

</div>



</div>
  </body>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
