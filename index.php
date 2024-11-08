<?php require_once('header.php');?>
<div class="index_content">
  <p class="index_letters">
    Vă punem la dispoziție o bază de date de <?php echo count($movies); ?> filme împărțite în <?php echo count($genres); ?> genuri.
  </p>
  <div class="index_row">
      <div class="index_column">
        <p class="search_results">Cele mai vechi filme:</p>
        <?php
          usort($movies, 'comparatorFunc');
          for ($i=0; $i < 10; $i++) {
            $movie = $movies[$i];
            include 'archive-movie.php'; } ?>
      </div>
      <div class="index_column">
        <p class="search_results">Cele mai noi filme:</p>
          <?php
            for ($i = count($movies)-1; $i > count($movies)-11; $i--) {
              $movie = $movies[$i];
              include 'archive-movie.php'; } ?>
      </div>
  </div>
</div>
<?php require_once('footer.php'); ?>
