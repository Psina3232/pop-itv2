<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <title>Pop it MVC</title>
</head>
<body class="">
  <div class="d-flex">
   <nav class="nav">
       <a href ="<?= app()->route->getUrl('/hello') ?>">Главная</a>
       <?php if (app()->auth::check()): ?>
            <!-- <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->login ?>)</a> -->
            <?php if (app()->auth::role() == "admin"): ?>
                <!-- <h3>Функции админа</h3> -->
                <a href="<?= app()->route->getUrl('/employees') ?>">Добавить сотрудника отдела</a>
                <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->login ?>)</a>
            <?php elseif (app()->auth::role() == "hr"): ?>
              <!-- <h3>Функции сотрудника</h3> -->
                <a href="<?= app()->route->getUrl('/emp') ?>">Добавить сотрудника</a>
                <!-- <a href="<?= app()->route->getUrl('/department') ?>">Добавить подразделение</a> -->
                <a href="<?= app()->route->getUrl('/subunit') ?>">Добавить состав</a>
                <a href="<?= app()->route->getUrl('/subunit_sel') ?>">Выбор по составу</a>
                <a href="<?= app()->route->getUrl('/calculate') ?>">Подсчет среднего возраста</a>
                <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->login ?>)</a>
            <?php endif; ?>
       <?php else: ?>
            <a href ="<?= app()->route->getUrl('/login') ?>">Войти</a>
       <?php endif; ?>
   </nav>
   </div>

<main>
   <?= $content ?? '' ?>
</main>

<style>
   header{
        background-color: white;
        padding: 10px 0;
    }
    .nav{
      background-color: #2c2c2c;
      width: 100%;
      height:5vh;
      display: flex; 
      justify-content: center; 
      align-items: center;
}
   a{
      color: white;
      margin-left: 25px;
      text-decoration: none;
   }
   .center{
    text-align: center;
    padding: 5px 10px;
    margin-top: 40px;
    background-color: white;
  }
  label{
   text-align: start;
  }
  .column{
   display: flex;
   flex-direction: column;
   gap:10px;
   width: 300px;
   
   
  }
  .add_employees > button{
    width: 40px;
    
  }
  form{
    display: flex;
    justify-content: center;
  }
  button:hover{
    background-color: grey;
  }

  .count_input{
    width: 40px;
    margin-left: 20px;
  }
  form > div{
    display: flex;
    justify-content: center;
  }
  #department_button{
    width: 65px;
    margin-left: 20px;
  }

  #emp_button{
    width: 85px;
    margin-left: 20px;
  }

  .list_ul{
    text-align: start;
  }
   </style>

</body>
</html>