<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>РџРµСЂРІРѕСЂРѕРґРЅС‹Р№ РєСЂРёРЅР¶</title>
</head>

<body>
    <?php
    $modul = 36;
    $arr = [];
    $d = 0;
    for ($i = 2; $i <= $modul; $i++) {
        if ($modul % $i == 0) {
            array_push($arr, $i);
        }
    }

    for ($i = 1; $i < $modul; $i++) {
        $isNotDivisible = true;
        foreach ($arr as $number) {
            if ($i % $number == 0) {
                $isNotDivisible = false;
                break;
            }
        }

        if ($isNotDivisible) {
            $d++;
        }
    }
    $g = 0;
    while ($g < $modul) {
        if (($g ** $d) % $modul == 1 && $g > 1) {
            echo $g;
            break;
        }
        $g++;
    }

    ?>
</body>

</html>
