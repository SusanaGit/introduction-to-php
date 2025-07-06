<?php
function mostrar($valor) {
    return $valor ? 'true' : 'false';
}

echo "<br/> Mayor: " . mostrar(7 > 2);
echo "<br/> Menor: " . mostrar(7 < 2);
echo "<br/> Mayor o igual: " . mostrar(7 >= 2);
echo "<br/> Menor o igual: " . mostrar(7 <= 2);
echo "<br/> Igual: " . mostrar(7 == 2);
echo "<br/> Distinto: " . mostrar(7 != 2);
echo "<br/> Igual y del mismo tipo: " . mostrar(7 === 7);
echo "<br/> Igual y de distinto tipo: " . mostrar(7 === '7');
?>