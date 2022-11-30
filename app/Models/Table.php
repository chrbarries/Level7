<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    /**
     * Retrives the information form  https://www.worldometers.info/coronavirus/
     * Gets information and parses it to JSON object.
     */

    private static function get_data()
    {

        $htmlContent = file_get_contents("https://www.worldometers.info/coronavirus/");
        $dom = new \DOMDocument();
        $dom->loadHTML($htmlContent, LIBXML_NOWARNING | LIBXML_NOERROR);
        $dom->preserveWhiteSpace = false;
        $table = $dom->getElementsByTagName('table');
        $table1 = $table->item(0);

        $rowArray[] = array();

        foreach ($table1->childNodes as $tElement) {
//  array index counter
            $y = 0;
            foreach ($tElement->childNodes as $tr) {
                if ($tr->nodeName == 'tr') {
//  array entity counter
                    $x = 0;
                    foreach ($tr->childNodes as $td) {
                        if ($td->nodeName == 'td') {

                            switch ($x) {
                                case 1:
                                    $rowArray[$y]['Country'] = $td->nodeValue;
                                    break;
                                case 2:
                                    $rowArray[$y]['Total_Cases'] = $td->nodeValue;
                                    break;
                                case 3:
                                    $rowArray[$y]['New_Cases'] = $td->nodeValue;
                                    break;
                                case 4:
                                    $rowArray[$y]['Total_Deaths'] = $td->nodeValue;
                                    break;
                                case 5:
                                    $rowArray[$y]['New_Deaths'] = $td->nodeValue;
                                    break;
                                case 6:
                                    $rowArray[$y]['Total_Recovered'] = $td->nodeValue;
                                    break;
                                default:
                            }
                            $x++;
                        }
                    }
                    $y++;
                }
            }
        }


//Strip the totals of the continents form the array
        $rowArray = array_slice($rowArray, 8);


        return json_encode($rowArray);
    }

    /**
     * Retrives data for TableController.php
     */

    public static function Table_data()
    {
        $data = self::get_data();

        return $data;
    }

}
