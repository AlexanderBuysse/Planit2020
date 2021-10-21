  <main class="main_detail-main">
    <div class="main-detail">
      <div class="whitebox">
        <p class="detail-date"><?php echo $crime['date']; ?></span></p>
        <h2 class="title-crime"><?php echo $crime['name']; ?></h2>
        <h3 class="title-type">Type: <?php echo $crime['type']; ?></h3>
        <div class="sectionwrapper">
          <section class=" section vervoer">
            <h4 class="section-title vervoer-title">
              <?php if($crime['type'] === 'museumroof'){
                echo 'Kopie van';
              } else if ($crime['type'] === 'spionage'){
                echo 'spion';
              } else {
                echo 'vervoer';
              }
              ?>
            </h4>
            <p class="section-text">
              <?php echo $crime['transportation']; ?>
            </p>
            <img class="auto" src="./assets/<?php echo $crime['transportation']; ?>.svg" alt="<?php echo $crime['transportation']; ?>" height="60">
          </section>
          <section class="section">
            <h4 class="section-title benodigdheden-title">
              Benodigdheden
            </h4>
            <ul class="section-text benodigdheden-list">
              <li class="benodigdheden-item">
                <?php echo $suplies; ?>
              </li>
            </ul>
          </section>
          <section class="section">
            <h4 class="section-title bank-title">
              <?php echo $crime['type']; ?>
            </h4>
            <p class="section-text">
              <?php echo $crime['subtype']; ?>
            </p>
            <img class="<?php echo $crime['type']; ?>" src="./assets/<?php echo $crime['subtype']; ?>.svg" alt="<?php echo $crime['type']; ?>" height="110">
          </section>
        </div>
        <section>
          <h4 class="title-type">
            slaagkans
          </h4>
          <div class="progresbardetail-wrapper">
            <progress class="progresbar-detail" value="<?php echo $crime['chanceofsucces']; ?>" max="100"> </progress> <span class="procent"><?php echo $crime['chanceofsucces']; ?>%</span>
          </div>
        </section>

      </div>

      <section class="buit-section">
        <div class="buit-wrapper">
          <h4 class="buit-title">
            Mogelijke buit
          </h4>
          <p class="money">
            €<?php echo $crime['loot']; ?>
          </p>
        </div>
      </section>
    </div>
  </main>
