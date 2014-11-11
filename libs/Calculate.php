<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 07.11.14
 * Time: 10:58
 */

class Calculate {
    public $R = 6372795;
    public function getDistance($lat1, $long1, $lat2, $long2) {
        $lat1  = floatval($lat1);
        $long1 = floatval($long1);
        $lat2  = floatval($lat2);
        $long2 = floatval($long2);
        //перевод коордитат в радианы
        $lat1 *= pi() / 180;
        $lat2 *= pi() / 180;
        $long1 *= pi() / 180;
        $long2 *= pi() / 180;

        //вычисление косинусов и синусов широт и разницы долгот
        $cl1    = cos($lat1);
        $cl2    = cos($lat2);
        $sl1    = sin($lat1);
        $sl2    = sin($lat2);
        $delta  = $long2 - $long1;
        $cdelta = cos($delta);
        $sdelta = sin($delta);

        //вычисления длины большого круга
        $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
        $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;
        $ad = atan2($y, $x);
        $dist = ($ad * $this->R)/1000; //расстояние между двумя координатами в километрах
        return round($dist, 2);
    }
    public function filterDistance($departmentsBank, $myLatitude, $myLongitude) {
        $filterDepartmentsBank = [];
        foreach($departmentsBank as $departmentBank) {
            //var_dump($departmentBank["longitude"]);
            //echo "<hr>";
            $distance = $this->getDistance($myLatitude, $myLongitude, $departmentBank["latitude"], $departmentBank["longitude"]);
            if($distance < 25) {
                $departmentBank["distance"] = $distance;
                $filterDepartmentsBank[] = $departmentBank;
            }
        }
        usort($filterDepartmentsBank, array(__CLASS__, "sortAscending"));
        return $filterDepartmentsBank;
    }
// Сортировка по возростанию
    public static function sortAscending($a, $b) {
        if ($a["distance"] == $b["distance"]) {
            return 0;
        }
        return ($a["distance"] < $b["distance"]) ? -1 : 1;
    }
}