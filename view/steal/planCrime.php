  <main class="main-detail crime__container">
    <section class="crime__header">
      <?php if ($_GET['step'] !== 'one') : ?>
        <div class="crime__chanseofsucces-wrapper">
          <p class="crime__chanseofsucces-info">Slaagkans tot nu:</p>
          <div class="crime__chanseofsucces-barwrapper">
            <progress class="crime__chanseofsucces-bar" value="<?php echo $_SESSION['crime']['chanceOfSucces']; ?>" max="100"> </progress>
            <p class="crime__chanseofsucces-info amount__chance"><?php echo $_SESSION['crime']['chanceOfSucces']; ?>%</p>
          </div>
        </div>
      <?php endif; ?>
      <div>
        <p class="title-crime yellow">nieuwe crime plannen</p>
        <h2 class="title__h2"><?php if ($_GET['step'] === 'one') echo "Stap 1: kies je soort crime" ?>
          <?php if ($_GET['step'] === 'two' && $_GET['type'] === 'bankoverval') echo "Stap 2: kies je bank" ?>
          <?php if ($_GET['step'] === 'two' && $_GET['type'] === 'museumroof') echo "Stap 2: kies je schilderij" ?>
          <?php if ($_GET['step'] === 'two' && $_GET['type'] === 'spionage') echo "Stap 2: kies een persoon" ?>
          <?php if ($_GET['step'] === 'three' && $_GET['type'] === 'bankoverval') echo "Stap 3: kies je vervoer" ?>
          <?php if ($_GET['step'] === 'three' && $_GET['type'] === 'museumroof') echo "Stap 3: kies een vervang stuk" ?>
          <?php if ($_GET['step'] === 'three' && $_GET['type'] === 'spionage') echo "Stap 3: kies een spion" ?>
          <?php if ($_GET['step'] === 'four') echo "Stap 4: kies je benodigdheden" ?>
          <?php if ($_GET['step'] === 'five') echo "Stap 5: kies je datum" ?></h2>
      </div>
    </section>
    <div class="crime__padding">
      <div class="crime__content">

        <?php if ($_GET['step'] === 'one') : ?>
          <div>
            <form class="crime__form" method="POST" action="index.php?page=planCrime&step=one" enctype="multipart/form-data">
              <input type="hidden" name="action" value="stepOne" />
              <input type="hidden" name="actionform" value="index.php?page=planCrime&step=one" />
              <div class="crime__formwrapper">
                <label class="crime__inputimg">
                  <p class="slaagkans_chest slaagkans__positief slaagkans__stapeen">Buit €500 - €20 000</p>
                  <input type="radio" name="crimetype" value="bankoverval" class="hidden" required>
                  <img src="./assets/bankoverval.svg" class="crime__form-img" alt="bankoverval" width="250">
                </label>
                <label class="crime__inputimg">
                  <p class="slaagkans_chest slaagkans__positief slaagkans__stapeen">Buit €1000 - €20 000</p>
                  <input type="radio" name="crimetype" value="museumroof" class="hidden" required>
                  <img src="./assets/museumroof.svg" class="crime__form-img" alt="museumroof" width="250">
                </label>
                <label class="crime__inputimg">
                  <p class="slaagkans_chest slaagkans__positief slaagkans__stapeen">Buit €400 - €15 000</p>
                  <input type="radio" name="crimetype" value="spionage" class="hidden" required>
                  <img src="./assets/spionage.svg" class="crime__form-img" alt="spionage" width="250">
                </label>
              </div>
              <div class="form__inputwrapper">
                <label class="form__flex">Naam van je crime<br>
                  <input class="input-crime" placeholder="Naam van je crime" required type="text" name="nameCrime" maxlength="25" minlength="3">
                </label>
              </div>
              <input type="submit" class="crime__button crime__button-submit margin-none" value="volgende stap">
            </form>
          </div>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'two' && $_GET['type'] === 'bankoverval') : ?>
          <div class=crime__wrapper>
            <div class="crime__bankwrapper">
              <article class="crime__section-bank">
                <h3 class="crime__banktitle">bank</h3>
                <p class="section-text crime__bankinfo"></p>
              </article>
              <article class="crime__section-bank">
                <h3 class="crime__banktitle">mogelijke buit</h3>
                <p class="section-text crime__bankinfo"></p>
              </article>

              <article class="crime__section-bank">
                <h3 class="crime__banktitle">moeilijkheid</h3>
                <p class="section-text crime__bankinfo"></p>
              </article>
            </div>
            <form action="index.php?page=planCrime&step=two" method="POST" class="crime__form-center crime__form">
              <input type="hidden" name="chanceAmount" value="0" class="chanceAmountInput" />
              <input type="hidden" name="action" value="stepTwo">
              <input type="hidden" name="loot" class="loot" value="0" />
              <div class="crime__bankcontent">
                <label class="crime__imgmiddle">
                  <input type="radio" name="sort" value="post" class="hidden" required>
                  <img src="./assets/postoffice.svg" alt="post kantoor" width="100" class="crime__banksort bank">
                  <img src="./assets/street.svg" alt="street" width="400" class="crime__street">
                </label>
                <label class="crime__imgmiddle">
                  <input type="radio" name="sort" value="nationalebank" class="hidden" required>
                  <img src="./assets/nationalebank.svg" alt="nationale bank" width="100" class="crime__banksort bank">
                  <img src="./assets/street.svg" alt="street" width="400" class="crime__street">
                </label>
                <label class="crime__imgmiddle">
                  <input type="radio" name="sort" value="safe" class="hidden" required>
                  <img src="./assets/statesafe.svg" alt="staatskluis" width="50" class="crime__banksort bank">
                  <img src="./assets/street.svg" alt="street" width="400" class="crime__street none">
                </label>
              </div>
              <div class="buttons">
                <a class="crime__button crime__button-previous margin-left" href="index.php?page=planCrime&step=one">Vorige stap</a>
                <input type="submit" class="crime__button crime__button-submit margin-none" value="volgende stap">
              </div>
            </form>
          </div>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'two' && $_GET['type'] === 'museumroof') : ?>
          <div>
            <form action="index.php?page=planCrime&step=two" method="POST" class="crime__form">
              <input type="hidden" name="chanceAmount" value="0" class="chanceAmountInput" />
              <input type="hidden" name="action" value="stepTwo">
              <input type="hidden" name="loot" value="0" class="loot"/>
              <div class="crime__formwrapper">
                <label class="crime__inputimg">
                  <input type="radio" name="sort" value="picasso" class="hidden" required>
                  <img src="./assets/picasso.svg" class="crime__form-img painting" alt="picasso" width="250">
                </label>
                <label class="crime__inputimg">
                  <input type="radio" name="sort" value="vangogh" class="hidden" required>
                  <img src="./assets/vangogh.svg" class="crime__form-img painting" alt="van gogh" width="250">
                </label>
                <label class="crime__inputimg">
                  <input type="radio" name="sort" value="mondriaan" class="hidden" required>
                  <img src="./assets/mondriaan.svg" class="crime__form-img painting" alt="mondriaan" width="250">
                </label>
              </div>
              <div class="buttons">
                <a class="crime__button crime__button-previous margin-left" href="index.php?page=planCrime&step=one">Vorige stap</a>
                <input type="submit" class="crime__button crime__button-submit margin-none" value="volgende stap">
              </div>
            </form>
          </div>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'two' && $_GET['type'] === 'spionage') : ?>
          <div>
            <form action="index.php?page=planCrime&step=two" method="POST" class="crime__form">
              <input type="hidden" name="chanceAmount" value="0" class="chanceAmountInput" />
              <input type="hidden" name="action" value="stepTwo">
              <input type="hidden" name="loot" value="0" class="loot"/>
              <div class="crime__formwrapper">
                <label class="crime__inputimg">
                  <input type="radio" name="sort" value="niels de stadsbader" class="hidden" required>
                  <img src="./assets/nielsdestadsbader.svg" class="crime__form-imgspy" alt="niels de stadsbader" width="250">
                </label>
                <label class="crime__inputimg">
                  <input type="radio" name="sort" value="koningfilip" class="hidden" required>
                  <img src="./assets/koningfilip.svg" class="crime__form-imgspy " alt="koning filip" width="250">
                </label>
                <label class="crime__inputimg">
                  <input type="radio" name="sort" value="darthvader" class="hidden" required>
                  <img src="./assets/darthvader.svg" class="crime__form-imgspy" alt="darth vader" width="250">
                </label>
                <label class="crime__inputimg">
                  <input type="radio" name="sort" value="elonmusk" class="hidden" required>
                  <img src="./assets/elonmusk.svg" class="crime__form-imgspy" alt="elon musk" width="250">
                </label>
              </div>
              <div class="buttons">
                <a class="crime__button crime__button-previous margin-left" href="index.php?page=planCrime&step=one">Vorige stap</a>
                <input type="submit" class="crime__button crime__button-submit margin-none" value="volgende stap">
              </div>
            </form>
          </div>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'three' && $_GET['type'] === 'bankoverval') : ?>
          <form action="index.php?page=planCrime&step=three" method="POST" class="crime__form">
            <input type="hidden" name="action" value="stepThree" />
            <input type="hidden" name="chanceAmount" value="0" class="chanceAmountInput" />
            <input type="hidden" name="loot" value="0" class="loot" />
            <div class="crime__formwrapper">
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__stapeen">Slaagkans: -10%</p>
                <input type="radio" name="transportation" value="eigenvervoer" class="hidden" required>
                <img src="./assets/eigenauto.svg" class="crime__form-img trans" alt="eigen auto" width="250">
              </label>
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__positief slaagkans__best"><span class="slaagkans__best-text">BESTE</span> Slaagkans: +20%</p>
                <input type="radio" name="transportation" value="taxidienst" class="hidden" required>
                <img src="./assets/lamborgini.svg" class="crime__form-img trans" alt="lamborgini" width="250">
              </label>
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__positief slaagkans__stapeen">Slaagkans: +10%</p>
                <input type="radio" name="transportation" value="besteldienst" class="hidden" required>
                <img src="./assets/busje.svg" class="crime__form-img trans" alt="busje" width="250">
              </label>
            </div>
            <div class="buttons">
              <a class="crime__button crime__button-previous margin-left" href="index.php?page=planCrime&step=two&type=<?php echo $_SESSION['crime']['type']; ?>">Vorige stap</a>
              <input type="submit" class="crime__button crime__button-submit margin-none" value="volgende stap">
            </div>
          </form>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'three' && $_GET['type'] === 'museumroof') : ?>
          <form action="index.php?page=planCrime&step=three" method="POST" class="crime__form">
            <input type="hidden" name="action" value="stepThree" />
            <input type="hidden" name="loot" value="0" class="loot" />
            <input type="hidden" name="chanceAmount" value="0" class="chanceAmountInput" />
            <div class="crime__formwrapper">
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__stapeen">Slaagkans: -10%</p>
                <input type="radio" name="transportation" value="eigenkopie" class="hidden" required>
                <img src="./assets/jezelf.svg" class="crime__form-img trans" alt="eigen auto" width="250">
              </label>
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__positief slaagkans__best"><span class="slaagkans__best-text">BESTE</span> Slaagkans: +20%</p>
                <input type="radio" name="transportation" value="grootmeester" class="hidden" required>
                <img src="./assets/meesterkopie.svg" class="crime__form-img trans" alt="lamborgini" width="250">
              </label>
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__positief slaagkans__stapeen">Slaagkans: +10%</p>
                <input type="radio" name="transportation" value="student" class="hidden" required>
                <img src="./assets/studentkopie.svg" class="crime__form-img trans" alt="busje" width="250">
              </label>
            </div>
            <div class="buttons">
              <a class="crime__button crime__button-previous margin-left" href="index.php?page=planCrime&step=two&type=<?php echo $_SESSION['crime']['type']; ?>">Vorige stap</a>
              <input type="submit" class="crime__button crime__button-submit margin-none" value="volgende stap">
            </div>
          </form>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'three' && $_GET['type'] === 'spionage') : ?>
          <form action="index.php?page=planCrime&step=three" method="POST" class="crime__form">
            <input type="hidden" name="action" value="stepThree" />
            <input type="hidden" name="loot" value="0" class="loot" />
            <input type="hidden" name="chanceAmount" value="0" class="chanceAmountInput" />
            <div class="crime__formwrapper">
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__stapeen">Slaagkans: -10%</p>
                <input type="radio" name="transportation" value="jezelf" class="hidden" required>
                <img src="./assets/jezelf.svg" class="crime__form-img spy" alt="jezelf" width="250">
              </label>
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__positief slaagkans__best"><span class="slaagkans__best-text">BESTE</span> Slaagkans: +30%</p>
                <input type="radio" name="transportation" value="jamesbond" class="hidden" required>
                <img src="./assets/jamesbond.svg" class="crime__form-img spy" alt="james bond" width="250">
              </label>
              <label class="crime__inputimg">
                <p class="slaagkans_chest slaagkans__positief slaagkans__stapeen">Slaagkans: +5%</p>
                <input type="radio" name="transportation" value="wonderkind" class="hidden" required>
                <img src="./assets/wonderkind.svg" class="crime__form-img spy" alt="wonder kind" width="250">
              </label>
            </div>
            <div class="buttons">
              <a class="crime__button crime__button-previous margin-left" href="index.php?page=planCrime&step=two&type=<?php echo $_SESSION['crime']['type']; ?>">Vorige stap</a>
              <input type="submit" class="crime__button crime__button-submit margin-none" value="volgende stap">
            </div>
          </form>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'four') : ?>
          <form action="index.php?page=planCrime&step=four" class="form-four  crime__form" method="POST">
            <input type="hidden" name="action" value="stepFour" />
            <input type="hidden" name="loot" value="0" class="loot" />
            <input type="hidden" name="chanceAmount" value="0" class="chanceAmountInput" />
            <input type="hidden" name="placeholder" value="0" class="chancePlaceholder" />
            <input type="hidden" class="benodigdheden" name="benodigdeden" value="geen">
            <div class="form_suplies">
              <div class="basic_suplies">
                <h3 class="suplies_title">Voorraad basis benodigdheden</h3>
                <ul class="suplies_list suplies_container">
                  <li class="gereedschap_item list_item_one"><label for="item_one"><input type="checkbox" class="suplies item_one" name="item" id="item_one" value="vals geweer">
                      <img class="gereedschap" src="./assets/geweer.svg" alt="geweer"></label></li>
                  <li class="gereedschap_item list_item_two"><label for="item_touw"><input type="checkbox" class="suplies item_two" name="item" id="item_touw" value="touw">
                      <img class="gereedschap_item gereedschap" src="./assets/touw.svg" alt="touw"></label></li>
                  <li class="gereedschap_item list_item_three"><label for="item_geweer"><input type="checkbox" class="suplies item_three" name="item" id="item_geweer" value="extra telefoon">
                      <img class="big gereedschap_item gereedschap" src="./assets/gsm.svg" alt="gsm"></label></li>
                  <li class="gereedschap_item list_item_four"><label for="item_bivak"><input type="checkbox" class="suplies item_four" name="item" id="item_bivak" value="bivaksmuts">
                      <img class="big  gereedschap_item gereedschap" src="./assets/bivak.png" alt="gsm"></label></li>
                </ul>
              </div>
              <div class="suplies_container main_chest">
                <h3 class="chest_title">
                  Jouw kist<span class=title_span></span>
                </h3>
                <p class="chest_paragraph">
                  Sleep wat je nodig hebt in de kist
                </p>
                <p class="slaagkans_chest slaagkanst_chestpositie">
                  slaagkans: -20%
                </p>
                <img class="image-chest" src="./assets/chest.svg" alt="chest">
              </div>
              <div class="extra_suplies">
                <h3 class="suplies_title">Voorraad extra benodigdheden</h3>
                <ul class="extra_list suplies_container">
                  <li class="gereedschap_item extra_one"><label for="extra_zakmes"><input type="checkbox" class="suplies item_one" name="extra" id="extra_zakmes" value="zakmes">
                      <img class="gereedschap" src="./assets/zakmes.svg" alt="zakmes"></label></li>
                  <li class="gereedschap_item extra_two"><label for="extra_kogelvrijvest"><input type="checkbox" class="suplies item_two" name="extra" id="extra_kogelvrijevest" value="kogelvrijvest">
                      <img class="gereedschap" src="./assets/kogelvrije.svg" alt="kogelvrije vest"></label></li>
                  <li class="gereedschap_item extra_three"><label for="extra_bazooka"><input type="checkbox" class="suplies item_three" name="extra" id="extra_bazooka" value="bazooka">
                      <img class="big gereedschap" src="./assets/bazooka.svg" alt="bazooka"></label></li>
                </ul>
              </div>
            </div>
            <div class="buttons">
              <a class="crime__button crime__button-previous" href="index.php?page=planCrime&step=three&type=<?php echo $_SESSION['crime']['type']; ?>">Vorige stap</a>
              <input type="submit" class="crime__button crime__button-submit" value="volgende stap">
            </div>
          </form>
        <?php endif; ?>

        <?php if ($_GET['step'] === 'five') : ?>
          <form action="index.php?page=planCrime&step=five" class="form-five crime__form" method="POST">
            <input type="hidden" name="action" value="stepFive" />
            <input type="hidden" class="selected-date" name="date" value="3 Dec" required>
            <input type="hidden" class="loot" name="loot" value="0">
            <input type="hidden" class="succes" name="succes" value="succes">
            <div class="calender_container">
              <div class="calender">
                <div class="month">
                  <span class="material-icons left">
                    keyboard_arrow_left
                  </span>
                  <div class="month_date">
                    <h3 class="month_title">December 2020</h3>
                  </div>
                  <span class="material-icons right">
                    keyboard_arrow_right
                  </span>
                </div>
                <div class="weekdays_wrapper">
                  <ul class="weekdays">
                    <li class="weekday">Ma</li>
                    <li class="weekday">Di</li>
                    <li class="weekday">Woe</li>
                    <li class="weekday">Don</li>
                    <li class="weekday">Vrij</li>
                    <li class="weekday">Zat</li>
                    <li class="weekday">Zon</li>
                  </ul>
                  <ul class="days">
                    <li class="day prev_days">30</li>
                    <li class="today day">1</li>
                    <li class="day">2</li>
                    <li class="day">3</li>
                    <li class="day">4</li>
                    <li class="day">5</li>
                    <li class="day">6</li>
                    <li class="day">7</li>
                    <li class="day">8</li>
                    <li class="day">9</li>
                    <li class="day">10</li>
                    <li class="day">11</li>
                    <li class="day">12</li>
                    <li class="day">13</li>
                    <li class="day">14</li>
                    <li class="day">15</li>
                    <li class="day">16</li>
                    <li class="day">17</li>
                    <li class="day">18</li>
                    <li class="day">19</li>
                    <li class="day">20</li>
                    <li class="day">21</li>
                    <li class="day">22</li>
                    <li class="day">23</li>
                    <li class="day">24</li>
                    <li class="day">25</li>
                    <li class="day">26</li>
                    <li class="day">27</li>
                    <li class="day">28</li>
                    <li class="day">29</li>
                    <li class="day">30</li>
                    <li class="day">31</li>
                    <li class="next_days day">1</li>
                    <li class="next_days day">2</li>
                    <li class="next_days day">3</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="buttons">
              <a class="crime__button crime__button-previous" href="index.php?page=planCrime&step=four">Vorige stap</a>
              <input type="submit" class="crime__button crime__button-submit" value="Voltooien">
            </div>
          </form>
        <?php endif; ?>

      </div>
    </div>
  </main>
