<?php
$ttn = 20; // define total task number
$ttn1 = 1/$ttn; // 1/ttn
$cs = mt_rand(70,150); // define start complexity
$cl = $cs; // complexity level
$er = 1; // error rate
$ra = 0; // right answers
$wa = 0; // wrong answers
//header 
echo "TTN = $ttn, Cs = $cs <br/><br/>";
echo '<table width ="700" border="1" style="border: 1px solid black; border-collapse: collapse;">';
echo '<tr>'.
	 '<td>step</td>'.
	 '<td>sign</td>'.
	 '<td>ER</td>'.
	 '<td>T</td>'.
	 '<td>Tn</td>'.
	 '<td>Td</td>'.
	 '<td>TR</td>'.
	 '<td>CL</td>'.
	 '<td>Cd</td>'.
	 '<tr>';
//table
for ($i=0; $i < $ttn; $i++) {
	$sign = mt_rand(0,1) == 1 ? 1: -1; // right (1) or wrong(-1) answer
	($sign == 1) ? $ra++ : $wa++; // increase counters
	$er = $er + $sign * $ttn1; // calculate error level
	$t  = mt_rand(10,500); // define task execution time
	$tn = mt_rand(30,300); // define nornal task execution time
	$td = (($t - $tn) == 0) ? 1 : ($t - $tn); // calculate time delta 
	$tr = round($ttn1 * ($t/$td), 3); // calculate time rate
	$co = $cl; // save previous complexity level
	$cl = round($cl + $sign * $cl * $ttn1 * ($er - $tr), 0); // calculate current complexity level
	$cd = $cl - $co; // calculate complexity delta
	echo "<tr>".
	 "<td>".($i+1)."</td>".
	 "<td>$sign</td>".
	 "<td>$er</td>".
	 "<td>$t</td>".
	 "<td>$tn</td>".
	 "<td>$td</td>".
	 "<td>$tr</td>".
	 "<td>$cl</td>".
	 "<td>$cd</td>".
	 "<tr>";
}
echo '</table>';
//summaries
echo "<br/><br/> Right answers = $ra, Wrong answers = $wa, Cdelta total = ".($cl-$cs);
?>


			