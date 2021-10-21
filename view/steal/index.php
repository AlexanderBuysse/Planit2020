<main class="container">
  <div class="sidebar">
    <div class="header__main">
      <a href="" class="link-image"><img src="./assets/logo.svg" alt="logo" class="link-logo__home"></a>
    </div>

    <section class="header__section header__info">
      <h2 class="title__h2 header__title">Plan je crime</h2>
      <p class="header__text">Welkom bij de ultieme
        Crime planner. <em class="yellow">Plan je
          eigen overval, Museumroof
          of spionage.</em></p>
    </section>
    <section class="header__section header__date">
      <h2 class="title__h2 header__title">Je nieuwste crime</h2>
      <p class="date"><?php echo $lastCrime['date']; ?></span></p>
    </section>
  </div>

  <div class="content">
    <section class="main__section">
      <a href="index.php?page=planCrime&step=one" class="main__section-button"><span class="main__section-plus">+</span> Nieuwe Crime Plannen</a>
      <h2 class="title__h2 main__section-title">Overzicht van je geplande crimes</h2>
      <?php foreach ($crimes as $crime) : ?>
        <article class="crime">
          <div>
            <img src="./assets/<?php echo $crime['type']; ?>.svg" alt="<?php echo $crime['type']; ?>" width="213" class="crime__image">
          </div>
          <div class="crime__info">
            <h3 class="crime__title"><?php echo $crime['name']; ?></h3>
            <div class="crime__progres">
              <p class="crime__small">Slaagkans:</p>
              <progress class="progresbar crime__progres-bar crime__chanseofsucces-bar" value="<?php echo $crime['chanceofsucces']; ?>" max="100"> </progress>
            </div>
            <div>
              <p class="crime__small">Mogelijke buit:</p>
              <p class="crime__money">€<?php echo $crime['loot']; ?></p>
            </div>
          </div>
          <a href="index.php?page=detail&id=<?php echo $crime['id']; ?>" class="crime__button crime__button-home">Detail van crime</a>
        </article>
      <?php endforeach; ?>
    </section>
  </div>
</main>

</html>
