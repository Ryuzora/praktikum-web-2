<?php
$celcius = 37.841;
$fahrenheit = ($celcius * (9/5)) + 32;
$reamur = $celcius * (4/5);
$kelvin = $celcius + 273.15;

printf("Celsius = %.4f\n\n", $celcius);
printf("Fahrenheit (F) = %.4f\n", $fahrenheit);
printf("Reamur (R) = %.4f\n", $reamur);
printf("Kelvin (K) = %.4f\n", $kelvin);