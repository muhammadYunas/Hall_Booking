<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="home.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Active/Deactive</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newbk.php">View New Booking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update.php">Update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <form action="search.php" method="post" class="form-inline my-2 my-lg-0">
      <input name="src" class="form-control mr-sm-2" type="text" placeholder="Search Inactive Booking">
      <button value="search" class="btn btn-secondary my-2 my-sm-0" name="btnsrc" type="submit">Search</button>
    </form>
  </div>
</nav>