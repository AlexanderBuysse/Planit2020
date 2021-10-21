import './style.css';
{
  //today
  const date = new Date();

  // object met alle data van verschillende banken
  const banks = [
    {
      name: `post kantoor`,
      difficulty: `gemakkelijk`,
      loot: 500,
      chanceofsuccespenalty: 50
    },
    {
      name: `nationale bank`,
      difficulty: `medium`,
      loot: 10000,
      chanceofsuccespenalty: 20
    },
    {
      name: `staatskluis`,
      difficulty: `moeilijk`,
      loot: 20000,
      chanceofsuccespenalty: - 30
    }
  ];

  //object met alle data van vervoer
  const transportation = [
    {
      name: `eigen auto`,
      loot: 0,
      chanceofsuccespenalty: - 10
    },
    {
      name: `lamborgini`,
      loot: - 100,
      chanceofsuccespenalty: 20
    },
    {
      name: `busje`,
      loot: - 50,
      chanceofsuccespenalty: 10
    },
  ];

  //object met alle data van paintings
  const paintings = [
    {
      name: `picasso`,
      loot: 30000,
      chanceofsuccespenalty: - 10
    },
    {
      name: `van gogh`,
      loot: 5000,
      chanceofsuccespenalty: 10
    },
    {
      name: `mondriaan`,
      loot: 1000,
      chanceofsuccespenalty: 20
    },
  ];

  //object met alle data van personen
  const persons = [
    {
      name: `niels de stadsbader`,
      loot: 400,
      chanceofsuccespenalty: 60
    },
    {
      name: `koning filip`,
      loot: 2000,
      chanceofsuccespenalty: 10
    },
    {
      name: `darth vader`,
      loot: 6000,
      chanceofsuccespenalty: 10
    },
    {
      name: `elon musk`,
      loot: 15000,
      chanceofsuccespenalty: - 50
    },
  ];

  //object met alle data van spionnen
  const spys = [
    {
      name: `jezelf`,
      loot: 0,
      chanceofsuccespenalty: - 20
    },
    {
      name: `james bond`,
      loot: - 300,
      chanceofsuccespenalty: 30
    },
    {
      name: `wonder kind`,
      loot: - 50,
      chanceofsuccespenalty: 5
    },
  ];

  // object met alle data van verschillende benodigdheden
  const suplies = [
    {
      name: `vals geweer`,
      chanceofsuccespenalty: 5
    },
    {
      name: `touw`,
      chanceofsuccespenalty: 5
    },
    {
      name: `extra telefoon`,
      chanceofsuccespenalty: 15
    },
    {
      name: `bivaksmuts`,
      chanceofsuccespenalty: 15
    },
    {
      name: `zakmes`,
      chanceofsuccespenalty: 10
    },
    {
      name: `kogelvrijvest`,
      chanceofsuccespenalty: 10
    },
    {
      name: `bazooka`,
      chanceofsuccespenalty: 20
    }
  ];

  const handleClickBank = e => {
    const namebank = e.target.alt;
    for (let i = 0;i < banks.length;i ++) {
      if (namebank === banks[i].name) {
        const textfields = document.querySelectorAll(`.crime__bankinfo`);
        textfields[0].innerHTML = banks[i].name;
        textfields[2].innerHTML = banks[i].difficulty;
        textfields[1].innerHTML = `€${banks[i].loot}`;
        showChanceHtml(banks[i].chanceofsuccespenalty, banks[i].loot);
      }
    }
  };

  const handleClickTrans = e => {
    const nameTrans = e.target.alt;
    for (let i = 0;i < transportation.length;i ++) {
      if (nameTrans === transportation[i].name) {
        showChanceHtml(transportation[i].chanceofsuccespenalty, transportation[i].loot);
      }
    }
  };

  const handleClickSpys = e => {
    const nameSpy = e.target.alt;
    for (let i = 0;i < spys.length;i ++) {
      if (nameSpy === spys[i].name) {
        showChanceHtml(spys[i].chanceofsuccespenalty, spys[i].loot);
      }
    }
  };

  const handleClickPainting = e => {
    const namePainting = e.target.alt;
    for (let i = 0;i < paintings.length;i ++) {
      if (namePainting === paintings[i].name) {
        showChanceHtml(paintings[i].chanceofsuccespenalty, paintings[i].loot);
      }
    }
  };


  const handleClickSpy = e => {
    const namePerson = e.target.alt;
    for (let i = 0;i < persons.length;i ++) {
      if (namePerson === persons[i].name) {
        showChanceHtml(persons[i].chanceofsuccespenalty, persons[i].loot);
      }
    }
  };


  const showChanceHtml = async (amountChanse, loot) => {
    const response = await fetch(window.location.href, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
    const amountAlready = await response.json();
    document.querySelector(`.crime__chanseofsucces-bar`).value = parseInt(amountAlready) + amountChanse;
    document.querySelector(`.chanceAmountInput`).value = parseInt(amountAlready) + amountChanse;
    document.querySelector(`.amount__chance`).textContent = `${parseInt(amountAlready) + amountChanse}%`;
    if (loot !== undefined) {
      document.querySelector(`.loot`).value = loot;
    }
    chanceChecker(parseInt(amountAlready) + amountChanse);
  };

  //kijkt of slaagkans positief of negatief is en vernaderd aan de hand daarvan de kleur er van
  const chanceChecker = chanceAmount => {
    const $boxchance = document.querySelector(`.crime__chanseofsucces-wrapper`);
    console.log(chanceAmount);
    if (Math.sign(chanceAmount) === - 1) {
      $boxchance.classList.add(`slaagkans__negatief`);
      $boxchance.classList.remove(`slaagkans__positief`);
    } else {
      $boxchance.classList.remove(`slaagkans__negatief`);
      $boxchance.classList.add(`slaagkans__positief`);
    }
  };

  const chanceCheckerChest = chanceAmount => {
    const $chestchance = document.querySelector(`.slaagkans_chest`);
    if (Math.sign(chanceAmount) === - 1) {
      $chestchance.classList.add(`slaagkans__negatief`);
      $chestchance.classList.remove(`slaagkans__positief`);
    } else {
      $chestchance.classList.remove(`slaagkans__negatief`);
      $chestchance.classList.add(`slaagkans__positief`);
    }
  };

  const renderCalender = date => {
    date.setDate(7);

    const monthDays = document.querySelector('.days');
    const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();
    const firstDay = date.getDay();
    const lastDayIndex = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();
    const nextDays = 7 - lastDayIndex;
    const months = ['januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december'];
    document.querySelector('.month_title').innerHTML = months[date.getMonth()];
    let days = '';

    for (let i = firstDay;i > 0;i --) {
      days += `<button class="day prev_days">${prevLastDay - i + 1}</button>`;
    }

    for (let i = 1;i <= lastDay;i ++) {
      if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()) {
        days += ` <button class="today day">${i}</button>`;
      } else {
        days += ` <button class=day>${i}</button>`;
      }
    }

    for (let i = 1;i <= nextDays;i ++) {
      days += `<button class="day next_days">${i}</button>`;
      monthDays.innerHTML = days;
    }

  };

  const handelSelectDate = e => {
    e.preventDefault();
    const firstTarget = e.target.className;
    if (firstTarget !== 'day prev_days') {
      if (firstTarget !== 'day next_days') {
        const target = e.target.innerHTML;
        const setClassName = e.target;
        console.log(setClassName);
        //setClassName.className = ('selected');
        const month = document.querySelector('.month_title').innerHTML;
        const subMonth = month.substring(0, 3);
        const selectedDate = `${target} ${subMonth} 2020`;
        document.querySelector('.selected-date').value = selectedDate;
      }
    }
  };


  const outherItems = document.querySelectorAll('.gereedschap');

  const bigItems = document.querySelectorAll('.big');


  const handleChange = () => {
    const items = [];
    const checkboxes = document.querySelectorAll(`input[type="checkbox"]:checked`);
    checkboxes.forEach(checkbox => {
      items.push(checkbox.value);
    });
    document.querySelector('.benodigdheden').value = items;
    formFourChance(items);
    getChest(items, outherItems, bigItems);
  };

  const formFourChance = async items => {
    let chanceItems = 0;
    for (let i = 0;i < items.length;i ++) {
      for (let j = 0;j < suplies.length;j ++) {
        if (items[i] === suplies[j].name) {
          chanceItems += parseInt(suplies[j].chanceofsuccespenalty);
        }
      }
    }
    const amountAlready = document.querySelector(`.chancePlaceholder`).value;

    document.querySelector(`.crime__chanseofsucces-bar`).value = parseInt(amountAlready) + chanceItems;
    document.querySelector(`.chanceAmountInput`).value = parseInt(amountAlready) + chanceItems;
    document.querySelector(`.amount__chance`).textContent = `${parseInt(amountAlready) + chanceItems}%`;
    document.querySelector(`.slaagkans_chest`).textContent = `${chanceItems - 20}%`;
    document.querySelector(`.chest_title`).textContent = `Kost: €${chanceItems * 10}`;
    document.querySelector(`.loot`).value = - (chanceItems * 10);
    chanceChecker(parseInt(amountAlready) + chanceItems);
    console.log(chanceItems);
    chanceCheckerChest(chanceItems - 20);
  };

  //vrij repretatief, maar weet geen andere oplossing door de verschillende voorwaarden per item (sommige bevatten 4 vakken andere 1)
  const getChest = async(items, outherItems) => {

    const chestItems = document.querySelector('.image-chest');

    if (items.length === 1) {
      if (items.includes('vals geweer')) {
        chestItems.setAttribute('src', './assets/chestone.svg');
      } else if (items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestthree.svg');
      } else if (items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chestfour.svg');
      } else if (items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestfive.svg');
      } else if (items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chestsixteen.svg');
      } else if (items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chestseventeen.svg');
      } else if (items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chesteighteen.svg');
      }
    } else if (items.length === 2) {
      if (items.includes('vals geweer') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chesttwo.svg');
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestsix.svg');
      } else if (items.includes('vals geweer') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestseven.svg');
      } else if (items.includes('vals geweer') && items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chesteight.svg');
      } else if (items.includes('zakmes') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestnine.svg');
      } else if (items.includes('kogelvrijvest') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestten.svg');
      } else if (items.includes('kogelvrijvest') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestnineteen.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chesttwinty.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('vals geweer') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chesttwintyone.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('touw') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chesttwintytwo.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('touw') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chesttwintythree.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('vals geweer') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chesttwintyfour.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chesttwintyfive.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('kogelvrijvest') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chesttwintysix.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('kogelvrijvest') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chesttwintyseven.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chesttwintyeight.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('touw') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chesttwintynine.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('vals geweer') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chestthirty.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('extra telefoon') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chestthirtyone.svg');
        outherItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('extra telefoon') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestthirtytwo.svg');
        outherItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bivaksmuts') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestthirtythree.svg');
        outherItems.forEach(element => {
          element.className = 'display-none';
        });
      }
    } else if (items.length === 3) {
      if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chesteleven.svg');
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('vals geweer')) {
        chestItems.setAttribute('src', './assets/chesttwelf.svg');
      } else if (items.includes('vals geweer') && items.includes('kogelvrijvest') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestthirteen.svg');
      } else if (items.includes('vals geweer') && items.includes('touw') && items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chestfifteen.svg');
      } else if (items.includes('extra telefoon') && items.includes('zakmes') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestthirtyfour.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('extra telefoon') && items.includes('zakmes') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestthirtyfive.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('extra telefoon') && items.includes('zakmes') && items.includes('vals geweer')) {
        chestItems.setAttribute('src', './assets/chestthirtysix.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('extra telefoon') && items.includes('vals geweer') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestthirtyseven.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('extra telefoon') && items.includes('vals geweer') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestthirtyeight.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('extra telefoon') && items.includes('touw') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestthirtynine.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bivaksmuts') && items.includes('touw') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestfourty.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bivaksmuts') && items.includes('zakmes') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestfourtyone.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bivaksmuts') && items.includes('vals geweer') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestfourtytwo.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bivaksmuts') && items.includes('vals geweer') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestfourtythree.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bivaksmuts') && items.includes('vals geweer') && items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chestfourtyfour.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bivaksmuts') && items.includes('touw') && items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chestfourtyfive.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bazooka') && items.includes('touw') && items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chestfourtysix.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bazooka') && items.includes('kogelvrijvest') && items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chestfourtyseven.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bazooka') && items.includes('vals geweer') && items.includes('zakmes')) {
        chestItems.setAttribute('src', './assets/chestfourtyeight.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bazooka') && items.includes('vals geweer') && items.includes('touw')) {
        chestItems.setAttribute('src', './assets/chestfourtynine.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bazooka') && items.includes('vals geweer') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestfifty.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('bazooka') && items.includes('touw') && items.includes('kogelvrijvest')) {
        chestItems.setAttribute('src', './assets/chestfiftyone.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      }
    } else if (items.length === 4) {
      if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw') && items.includes('vals geweer')) {
        chestItems.setAttribute('src', './assets/chestfourteen.svg');
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestfiftytwo.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('vals geweer') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestfiftythree.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('touw') && items.includes('kogelvrijvest') && items.includes('vals geweer') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestfiftyfour.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('touw') && items.includes('vals geweer') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestfiftyfive.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('touw') && items.includes('vals geweer') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chestfiftysix.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('kogelvrijvest') && items.includes('touw') && items.includes('vals geweer') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chestfiftyseven.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('vals geweer') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chestfiftyeight.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chestfiftynine.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chestsixty.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('vals geweer') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chestsixtyone.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('kogelvrijvest') && items.includes('touw') && items.includes('vals geweer') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chestsixtytwo.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('touw') && items.includes('vals geweer') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chestsixtythree.svg');
        bigItems.forEach(element => {
          element.className = 'display-none';
        });
      }
    } else if (items.length === 5) {
      if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw') && items.includes('vals geweer') && items.includes('bivaksmuts')) {
        chestItems.setAttribute('src', './assets/chestsixtyfour.svg');
        outherItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw') && items.includes('vals geweer') && items.includes('extra telefoon')) {
        chestItems.setAttribute('src', './assets/chestsixtyfive.svg');
        outherItems.forEach(element => {
          element.className = 'display-none';
        });
      } else if (items.includes('zakmes') && items.includes('kogelvrijvest') && items.includes('touw') && items.includes('vals geweer') && items.includes('bazooka')) {
        chestItems.setAttribute('src', './assets/chestsixtysix.svg');
        outherItems.forEach(element => {
          element.className = 'display-none';
        });
      }
    }
  };


  const emptyChest = () => {
    if (document.querySelector(`.benodigdheden`).value === `geen`) {
      showChanceHtml(- 20);
    }
  };

  const dragging = () => {
    const draggables = document.querySelectorAll('.gereedschap_item');
    const chest = document.querySelectorAll('.suplies_container');
    draggables.forEach(draggables => {
      draggables.addEventListener('dragstart', () => {
        draggables.classList.add('drag');
      });
      draggables.addEventListener('dragend', () => {
        draggables.classList.remove('drag');
      });
    });
    chest.forEach(chest => {
      chest.addEventListener('dragover', () => {
        const drag = document.querySelector('.drag');
        const inputDrag = drag.getElementsByTagName('input')[0];
        chest.appendChild(drag);
        if (chest.className === 'suplies_container main_chest') {
          drag.classList.add('chest-item');
          inputDrag.checked = true;
        } else {
          drag.classList.remove('chest-item');
          inputDrag.checked = false;
        }
      });
    });
  };

  const handelSelectedDate = e => {
    const setDate = e.target;
    setDate.className = ('day selected');
  };

  const handelblurDate = e => {
    console.log('jeej');
    const setDate = e.target;
    setDate.className = ('day');
  };

  const init = () => {
    const trueOrFalse = document.querySelector('.date');
    if (trueOrFalse) {
      const nextCrimeDate = document.querySelector('.date').innerHTML;
      console.log(nextCrimeDate);
      const CrimeDateArray = nextCrimeDate.split(` `);
      console.log(CrimeDateArray);
      const newNextCrimeDate = CrimeDateArray.splice(0, 2).join(`<br>`);
      document.querySelector('.date').innerHTML = newNextCrimeDate;
    }

    const supliescheck = document.querySelector('.benodigdheden-item');
    if (supliescheck) {
      const suplieslist = document.querySelector('.benodigdheden-item').innerHTML;
      if (suplieslist !== '') {
        console.log(suplieslist);
        const suppliesArray = suplieslist.split(`,`);
        console.log(suppliesArray);
        const joinedSupplies = suppliesArray.join(`<br>`);
        document.querySelector('.benodigdheden-item').innerHTML = joinedSupplies;
      }
    }

    //kijkt of kans positief of negatief is en past het aan
    const $numberchance = document.querySelector(`.amount__chance`);
    if ($numberchance) {
      $numberchance.textContent.split(``);
      const number = $numberchance.textContent.split(``);
      number.pop();
      chanceChecker(number.join(``));
    }

    const formFourTemplateChance = async () => {
      const response = await fetch(window.location.href, {
        headers: new Headers({
          Accept: 'application/json'
        })
      });
      document.querySelector(`.chancePlaceholder`).value = await response.json() - 20;
    };

    const $form = document.querySelector(`.form-five`);
    if ($form) {
      document.querySelector('.left').addEventListener('click', () => {
        date.setMonth(date.getMonth() - 1);
        renderCalender(date);
      });
      document.querySelector('.right').addEventListener('click', () => { date.setMonth(date.getMonth() + 1);
        renderCalender(date);
      });
      renderCalender(date);

      document.querySelector('.days').addEventListener('click', handelSelectDate);
      const day = document.querySelectorAll('.day');
      day.forEach(d => {
        console.log(d.className);
        if (d.className !== 'day prev_days') {
          d.addEventListener('click', handelSelectedDate);
          d.addEventListener('blur', handelblurDate);
        }
      });
      //document.querySelector('.days').addEventListener('blur', handleBlurDate);
    }

    //event listener die eigenschappen van je bank toont
    const $imagebanks = document.querySelectorAll(`.bank`);
    if ($imagebanks) {
      $imagebanks.forEach($bank => {
        $bank.addEventListener(`click`, handleClickBank);
      });
    }

    const $imageTrans = document.querySelectorAll(`.trans`);
    if ($imageTrans) {
      $imageTrans.forEach($trans => {
        $trans.addEventListener(`click`, handleClickTrans);
      });
    }

    const $imageSpys = document.querySelectorAll(`.spy`);
    if ($imageSpys) {
      $imageSpys.forEach($spy => {
        $spy.addEventListener(`click`, handleClickSpys);
      });
    }

    const $imagePaintings = document.querySelectorAll(`.painting`);
    if ($imagePaintings) {
      $imagePaintings.forEach($painting => {
        $painting.addEventListener(`click`, handleClickPainting);
      });
    }

    const $imageSpy = document.querySelectorAll(`.crime__form-imgspy`);
    if ($imageSpy) {
      $imageSpy.forEach($painting => {
        $painting.addEventListener(`click`, handleClickSpy);
      });
    }

    const $formTwo = document.querySelector(`.form-four`);
    if ($formTwo) {
      document.addEventListener(`drag`, handleChange);
      dragging();
      emptyChest();
      formFourTemplateChance();
    }
  };

  init();

}

