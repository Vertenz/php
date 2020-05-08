<?php

 $number = 0; //для первого задания
 $number2 = 0; //для второго задания
 
 $state = [
     'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
     'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
     'Рязанская область' => ['Новомичуринск', 'Рыбное', 'Ряжск', 'Рязань']
 ];
 
 $transcription = [
     'а' => 'a',
     'А' => 'A',
     'б' => 'b',
     'Б' => 'B',
     'в' => 'v',
     'В' => 'V',
     'г' => 'g',
     'Г' => 'G',
     'д' => 'd',
     'Д' => 'D',
     'я' => 'ya',
     'Я' => 'Ya'
 ];
 
 $userText = $_POST['text'];
 
function spaceRemove($text) {
              $text = explode(' ', $text);
     		  foreach ($text as $key => $word) {
		      echo "$word";
		      if (count($text) != $key + 1) {
		          echo "_";
		      }
		  }
 };
 
 
$menu = [
  'lesson 1' => ['ex1', 'ex2'],
  'lessin 2' => ['ex1', 'ex2'],
  'Lesson 3' => ['ex1', 'ex2', 'ex3', 'ex4', 'ex5', 'ex6', 'ex7', 'ex8', 'ex9'] 
];
 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lesson3</title>
</head>
<body>
	<nav> 
	<!-- 
	<nav class="menu center">
    <ul class="menu__ul">
        <li class="menu__list">
            <a href="index.html" class="menu__href">Home</a>
            <div class="drop">
                <div class="drop__flex">
                    <h3 class="drop__h">women</h3>
                    <ul class="drop__ul">
                        <li><a href="product-list.html" class="drop__link">Dresses</a></li>
                        <li><a href="product-list.html" class="drop__link">Tops</a></li>
                        <li><a href="product-list.html" class="drop__link">Sweaters/Knits</a></li>
                        <li><a href="product-list.html" class="drop__link">Jackets/Coats</a></li>
                        <li><a href="product-list.html" class="drop__link">Blazers</a></li>
                        <li><a href="product-list.html" class="drop__link">Denim</a></li>
                        <li><a href="product-list.html" class="drop__link">Leggings/Pants</a></li>
                        <li><a href="product-list.html" class="drop__link">Skirts/Shorts</a></li>
                        <li><a href="product-list.html" class="drop__link">Accessories</a></li>
                    </ul>
	-->
	  <?php 
	  echo "<ul>";
	  foreach ($menu as $title => $subtitle){
	      echo "<li>$title";
	      echo "<ul>";
          foreach ($menu[$title] as $value) {
              echo "<li>$value</li>";
          };
        echo "</ul>";
        echo "</li>";
	  }
	  echo "</ul>";
	  ?>
	</nav>

	<h1>С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.</h1>
	<p>
    	<?php 
    	   while ($number <= 100) {
    	       if ($number % 3 == 0){
    	           echo "$number";
    	           echo "<br>";
    	       };
    	       $number++;
    	   };
    	?>
    </p>
	<br>
	<br>
	<h1>С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:</h1>
	<pre>
        0 – ноль.
        1 – нечетное число.
        2 – четное число.
        3 – нечетное число.
        …
        10 – четное число.
	</pre>
	<p>
		<?php 
		  do {
		      if ($number2 == 0) {
		          echo "$number2 - ноль";
		          echo "<br>";
		      }elseif ($number2 % 2 != 0) {
		          echo "$number2 - нечетное число.";
		          echo "<br>";
		      }else {
		          echo "$number2 - четное число";
		          echo "<br>";
		      };
		      $number2++;
		  }while ($number2 <= 10);
		?>
	</p>
	<br>
	<br>
	<h1>Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений 
	– массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:</h1>
	<pre>
		Московская область:
        Москва, Зеленоград, Клин
        Ленинградская область:
        Санкт-Петербург, Всеволожск, Павловск, Кронштадт
        Рязанская область … (названия городов можно найти на maps.yandex.ru)
	</pre>
	<p>
		<?php 
		  foreach ($state as $key => $city) {
		      echo "$key область в ней: <br>";
		      foreach ($state[$key] as $cityName) {
		          echo "$cityName <br>";
		      };
		  };
		?>
	</p>
	<br>
	<br>
	<h1>Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).</h1>
	<p>
		<?php 
		  foreach ($transcription as $rus => $en) {
		      echo " $rus = $en";
		}
		?>
	</p>
	<br>
	<br>
	<h1>Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.</h1>
	<form action="index.php" method="post">
		<p>Введите текст:</p>
		<input type="text" name="text"/>
		<input type="submit" />
	</form>
	<p>
		<?php 
            spaceRemove($userText);
		?>
	</p>
	<br>
	<br>
	<h1>*Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла.</h1>
	<p>
		<?php 
		  //for (function i() {$i = 0; echo "$i"}; $i <= 9; $i++);
		  //for ($i = 0; $i <= 9; echo "$i++");
		for ($i = 0; $i < 10; print $i++);
		      
		?>
	</p>
	<br>
	<br>
	
	<h1></h1>
	<p>
		<?php 
		foreach ($state as $key => $value) {
		    for ($i = 0; $i < count($state[$key]); $i++) {
		        //для работы с кириллицей
		        $rightCity = preg_split('//u', $state[$key][$i], 0, PREG_SPLIT_NO_EMPTY);
		        if ($rightCity[0] == 'К') {
		            echo implode($rightCity) . "<br>";
		      }
		    }
		}
		?>
	</p>
	
</body>
</html>