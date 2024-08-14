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
    <!-- navbar setion strnatcasecmp -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light " style="height: 10vh;">
  <a class="navbar-brand" href="#">logo</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">پارک ها</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">مراکز خرید</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">مکان های تاریخی</a>
      </li>
    </ul>
  </div>
</nav>


    <!-- navbar section end -->



    <!-- carousel section start -->
    <div
      id="carouselExampleInterval"
      class="carousel slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner h" style="height: 90vh;">
        <div class="carousel-item active" data-bs-interval="10000">
          <img
            src="./assets/images//parks//chamran/chamran-1.jpeg"
            class="d-block w-100"
            alt="..."
          />
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img
            src="./assets/images//parks//chamran/chamran-2.jpg"
            class="d-block w-100"
            alt="..."
          />
        </div>
        <div class="carousel-item">
          <img
            src="./assets/images//parks//chamran/chamran-3.jpg"
            class="d-block w-100"
            alt="..."
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleInterval"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- carousel section end -->
  </body>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
