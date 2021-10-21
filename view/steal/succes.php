<main class="main-detail crime__container">
  <section class="crime__header big__header">
    <p class="title-crime yellow">nieuwe crime plannen</p>
    <h2 class="title__h2 planned">Je geplande crime</h2>
    <img src="./assets/check.svg" alt="check">
  </section>
  <div class="crime__padding">
    <div class="crime__chanseofsucces-wrapper succes-wrapper">
      <p class="crime__chanseofsucces-info">Slaagkans:</p>
      <div class="crime__chanseofsucces-barwrapper">
        <progress class="crime__chanseofsucces-bar" value="<?php echo $_SESSION['crime']['chanceOfSucces']; ?>" max="100"> </progress>
        <p class="crime__chanseofsucces-info amount__chance"><?php echo $_SESSION['crime']['chanceOfSucces']; ?>%</p>
      </div>
    </div>
    <div class="crime__content">
      <div class="succes_button">
        <a class="crime__button crime__button-submit" href="index.php?page=index">Terug naar overzicht</a>
      </div>
    </div>
  </div>
