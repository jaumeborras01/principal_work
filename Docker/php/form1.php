<!DOCTYPE html>
<html>
<body>

<h2>Calculator with PHP</h2>

<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">

  <label for="num1">First number:</label><br>
  <input type="text" id="num1" name="num1" ><br>
  <label for="num2">Second number:</label><br>
  <input type="text" id="num2" name="num2"><br><br>
  
  <select name="operation">
  <option> plus </option>
  <option> minus </option>
  <option> multi </option>
  <option> div </option>
  <option> modulus </option>
  <option> exponent</option>

  <input type="submit" value="Submit">

</form>

  <?php 

    include 'Calc.php';
    try{

        $operation = $_POST['operation'];
        $num1 = (int) filter_var($_POST['num1'], FILTER_SANITIZE_NUMBER_INT);
        $num2 = (int) filter_var($_POST['num2'], FILTER_SANITIZE_NUMBER_INT);
        
        if(!isset($num1) or !isset($num2) or !is_int($num1) or !is_int($num2)){
          
          throw new Exception ("Insert all numbers please");
          
        }else{
        
          $calc = new Calc($num1, $num2);

          $result;

          switch($operation){
            case "plus":
                $result = $calc->plus();
              break;
            case "minus":
              $result = $calc->minus();
              break;
            case "multi":
              $result = $calc->multi();
              break;
            case "div":
              $result = $calc->div();
              break;
            case "modulus":
              $result = $calc->modulus();
              break;
            case "exponent":
              $result = $calc->exp();
              break;
          }
          echo "<br>the result of $operation is: $result";
        }

    }catch(Throwable  $t){
      echo $t->getMessage();
    }  

  ?>
</body>
</html>
