<?php require_once('layouts/header.php'); ?>
<div class="mult-table">
<?php
for ($i = 1; $i <=10; $i++):
	echo "<div class=\"mult-table-col\"> \n";
	for ($k = 1; $k <= 10; $k++):
	    $j = $i*$k;
	    $g = (string) $j;
            switch ($i):
                case 1: echo "<span style=\"color: red\">$i</span>";
                    break;
                case 2: echo "<span style=\"color: green\">$i</span>";
                    break;
                case 3: echo "<span style=\"color: yellow\">$i</span>";
                    break;
                case 4: echo "<span style=\"color: blue\">$i</span>";
                    break;
                case 5: echo "<span style=\"color: orange\">$i</span>";
                    break;
                case 6: echo "<span style=\"color: fuchsia\">$i</span>";
                    break;
                case 7: echo "<span style=\"color: silver\">$i</span>";
                    break;
                case 8: echo "<span style=\"color: grey\">$i</span>";
                    break;
                case 9: echo "<span style=\"color: aqua\">$i</span>";
                    break;
                default: echo "<span>$i</span>";
           endswitch;
           echo " * ";
           switch ($k):
               case 1: echo "<span style=\"color: red\">$k</span>";
                    break;
                case 2: echo "<span style=\"color: green\">$k</span>";
                    break;
                case 3: echo "<span style=\"color: yellow\">$k</span>";
                    break;
                case 4: echo "<span style=\"color: blue\">$k</span>";
                    break;
                case 5: echo "<span style=\"color: orange\">$k</span>";
                    break;
                case 6: echo "<span style=\"color: fuchsia\">$k</span>";
                    break;
                case 7: echo "<span style=\"color: silver\">$k</span>";
                    break;
                case 8: echo "<span style=\"color: grey\">$k</span>";
                    break;
                case 9: echo "<span style=\"color: aqua\">$k</span>";
                    break;
                default: echo "<span>$k</span>";
           endswitch;
           echo " = ";
           switch ($g[0]):
                case 1: echo "<span style=\"color: red\">$g[0]</span>";
                    break;
                case 2: echo "<span style=\"color: green\">$g[0]</span>";
                    break;
                case 3: echo "<span style=\"color: yellow\">$g[0]</span>";
                    break;
                case 4: echo "<span style=\"color: blue\">$g[0]</span>";
                    break;
                case 5: echo "<span style=\"color: orange\">$g[0]</span>";
                    break;
                case 6: echo "<span style=\"color: fuchsia\">$g[0]</span>";
                    break;
                case 7: echo "<span style=\"color: silver\">$g[0]</span>";
                    break;
                case 8: echo "<span style=\"color: grey\">$g[0]</span>";
                    break;
                case 9: echo "<span style=\"color: aqua\">$g[0]</span>";
                    break;
                default: echo "<span>$g[0]</span>";
           endswitch;
           switch ($g[1]):
                case 0: echo "<span style=\"color: maroon\">$g[1]</span>";
                    break;
                case 1: echo "<span style=\"color: red\">$g[1]</span>";
                    break;
                case 2: echo "<span style=\"color: green\">$g[1]</span>";
                    break;
                case 3: echo "<span style=\"color: yellow\">$g[1]</span>";
                    break;
                case 4: echo "<span style=\"color: blue\">$g[1]</span>";
                    break;
                case 5: echo "<span style=\"color: orange\">$g[1]</span>";
                    break;
                case 6: echo "<span style=\"color: fuchsia\">$g[1]</span>";
                    break;
                case 7: echo "<span style=\"color: silver\">$g[1]</span>";
                    break;
                case 8: echo "<span style=\"color: grey\">$g[1]</span>";
                    break;
                case 9: echo "<span style=\"color: aqua\">$g[1]</span>";
                    break;
                default: echo "<span>$g[1]</span>";
           endswitch;
           switch ($g[2]):
                default: echo "<span style=\"color: orange\">$g[2]</span>";
           endswitch;
           echo "<br>\n";
	endfor;
	echo "</div> \n";
endfor;
?>
</div>
<?php require_once('layouts/footer.php'); ?>