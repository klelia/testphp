<?php
include __DIR__ . './settings.php';
if( !isset($_SESSION['userId'])){
  header("location: login.php");
  session_destroy();
}

// Check connection


$sql = "SELECT `name`, `email` FROM `departments`";
$result = $conn->query($sql);

 
 
 $conn->close();

include __DIR__ . './partials/header.php';
?>
 <header class="p-4">

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">DB University</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
            </ul>
          
                        <form action="logout.php" method="POST" id="logout_form">
                            <input type="hidden" id="logout" name="logout" value="1">
                            <button class="btn btn-outline-success" type="submit">Logout</button>
                        </form>
                
           
        </div>
    </div>
</nav>

</header>
 <section class="university bg-light">
            <div class="container">

                <h3>Benvenuto</h3>

                <div class="row">

                    <div class="col-12">

                        <ul class="list-group">

                            <?php
                            if ($result && $result->num_rows > 0) {
                                // la query è andata a buon fine e ci sono delle righe di risultati
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <!-- finché ci sono righe di risultati -->
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><?php echo $row['email']; ?></div>
                                            <?php echo $row['name']; ?>
                                        </div>
                                    </li>

                                <?php }
                            } elseif ($result) { ?>
                                <!-- la query è andata a buon fine ma non ci sono righe di risultati -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <?php echo "0 results"; ?>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <!-- si è verificato un errore nella query (es: nome tabella sbagliato) -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <?php echo "query error"; ?>
                                    </div>
                                </li>
                            <?php } ?>

                        </ul>

                    </div>
                </div>
            </div>
 </section>

<?php 
include __DIR__ . './partials/footer.php';
?>



