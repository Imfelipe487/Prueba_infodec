<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factorial</title>
</head>
<body>
    <h1>Calculadora de Factorial</h1>

    <?php
    // Función para calcular el factorial de manera recursiva
    function factorialRecursivo($n) {
        if ($n == 0 || $n == 1) {
            return 1;
        } else {
            return $n * factorialRecursivo($n - 1);
        }
    }

    // Función para calcular el factorial de manera iterativa
    function factorialIterativo($n) {
        $resultado = 1;
        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }
        return $resultado;
    }

    // Número para calcular el factorial
    $numero = 5;

    // Calcular factorial de manera recursiva
    $factorialRecursivo = factorialRecursivo($numero);

    // Calcular factorial de manera iterativa
    $factorialIterativo = factorialIterativo($numero);

    echo "<p>El factorial de $numero de manera recursiva es: $factorialRecursivo</p>";
    echo "<p>El factorial de $numero de manera iterativa es: $factorialIterativo</p>";
    ?>

</body>
</html>
