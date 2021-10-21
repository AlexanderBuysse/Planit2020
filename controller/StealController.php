<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/StealDAO.php';

class StealController extends Controller
{

  function __construct()
  {
    $this->stealDAO = new StealDAO();
  }

  public function index()
  {
    $allCrimes = $this->stealDAO->selectAllCrimes();
    $this->set('crimes', $allCrimes);
    unset($_SESSION['crime']);
    unset($_SESSION['suplies']);
    $lastCrime = $this->stealDAO->selectLastCrime();
    if($lastCrime === false){
      $noCrimes['date']= 'geen crimes';
      $this->set('lastCrime', $noCrimes);
    } else {
      $this->set('lastCrime', $lastCrime);
    }
  }

  public function detail()
  {
    if (!empty($_GET['id'])) {
      $crime = $this->stealDAO->selectCrimeByID($_GET['id']);
      if ($crime === false) {
        header('location:index.php?page=index');
        exit();
      } else {
        $this->set('crime', $crime);
      }
    } else {
      header('location:index.php?page=index');
      exit();
    }

    if (!empty($_GET['id'])) {
      $suplies = $this->stealDAO->selectSupliesByCrimeID($_GET['id']);
      $sup = $suplies['suplies'];
        $this->set('suplies', $sup);
    }
  }


  public function planCrime()
  {
    $lastCrime = $this->stealDAO->selectLastCrime();
    if($lastCrime === false) {
      $_SESSION['crime']['crime_id'] = 1;
    } else {
      $_SESSION['crime']['crime_id'] = $lastCrime['id'] + 1;
    }
    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($_SESSION['crime']['chanceOfSucces']);
      exit();
    }

    if ($_GET['step'] == "one") {
      if (isset($_SESSION['crime']['type'])) {
          header('location:index.php?page=index');
          exit();
      };

      if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'stepOne') {
          $_SESSION['crime']['type'] = $_POST['crimetype'];
          $_SESSION['crime']['name'] = $_POST['nameCrime'];
          $_SESSION['crime']['chanceOfSucces'] = 0;
        }
        if ($_SESSION['crime']['type'] === 'bankoverval') {
          header('location:index.php?page=planCrime&step=two&type=bankoverval');
        } else if ($_SESSION['crime']['type'] === 'museumroof') {
          header('location:index.php?page=planCrime&step=two&type=museumroof');
        } else if ($_SESSION['crime']['type'] === 'spionage') {
          header('location:index.php?page=planCrime&step=two&type=spionage');
          exit();
        }
      }
    }

    if ($_GET['step'] == "two") {
      if (isset($_SESSION['crime']['loot'])) {
        header('location:index.php?page=index');
        exit();
      };

      if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'stepTwo') {
          $_SESSION['crime']['sort'] = $_POST['sort'];
          $_SESSION['crime']['chanceOfSucces']= $_POST['chanceAmount'];
          $_SESSION['crime']['loot'] = $_POST['loot'];
        }
        if ($_SESSION['crime']['type'] === 'bankoverval') {
          header('location:index.php?page=planCrime&step=three&type=bankoverval');
        } else if ($_SESSION['crime']['type'] === 'museumroof') {
          header('location:index.php?page=planCrime&step=three&type=museumroof');
          exit();
        } else if ($_SESSION['crime']['type'] === 'spionage') {
          header('location:index.php?page=planCrime&step=three&type=spionage');
          exit();
        }
      }
    }



    if ($_GET['step'] == "three") {
      if (isset($_SESSION['crime']['transport'])) {
        header('location:index.php?page=index');
        exit();
      };

      if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'stepThree') {
          $_SESSION['crime']['transport'] = $_POST['transportation'];
          $_SESSION['crime']['chanceOfSucces']= $_POST['chanceAmount'];
          $_SESSION['crime']['loot'] += $_POST['loot'];
        }
        header('location:index.php?page=planCrime&step=four');
        exit();
      }
    }

    if ($_GET['step'] == "four") {
      if (isset($_SESSION['suplies']['items'])) {
        header('location:index.php?page=index');
        exit();
      };

      if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'stepFour') {
          $_SESSION['suplies']['items'] = $_POST['benodigdeden'];
          $_SESSION['suplies']['crime_id'] = $_SESSION['crime']['crime_id'];
          $_SESSION['crime']['chanceOfSucces']= $_POST['chanceAmount'];
          $_SESSION['crime']['loot'] += $_POST['loot'];
          }
           header('location:index.php?page=planCrime&step=five');
           exit();
        }
      }


    if ($_GET['step']=="five"){
      if (isset($_SESSION['crime']['date'])) {
        header('location:index.php?page=index');
        exit();
      };

      if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'stepFive') {
          $_SESSION['crime']['date'] = $_POST['date'];

          $data = array(
            'name' => $_SESSION['crime']['name'],
            'type' => $_SESSION['crime']['type'],
            'transportation' => $_SESSION['crime']['transport'],
            'date' => $_SESSION['crime']['date'],
            'subtype' => $_SESSION['crime']['sort'],
            'chanceofsucces' =>  $_SESSION['crime']['chanceOfSucces'],
            'loot' => $_SESSION['crime']['loot']

          );
          $newCrime = $this->stealDAO->createCrime($data);
          $dateTwo = array(
            'suplies' => $_SESSION['suplies']['items'],
            'crime_id' =>  $_SESSION['suplies']['crime_id']
          );
            $newItems = $this->stealDAO->createItems($dateTwo);
        }
        header('location:index.php?page=succes');
        exit();
      }
    }
    }

   public function succes()
    {
    }
  }
