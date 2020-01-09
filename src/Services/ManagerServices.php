<?php
/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 09/01/2020
 * Time: 20:32
 */

namespace App\Services;


class ManagerServices
{
    public function __construct()
    {
    }

    public function resolveCombinations($combinations)
    {
        // $output = array();
        $outputString = "";
        foreach ($combinations as $key => $combination) {
            $combination = intval($combination);
            $tabNodes = array();
            $indexNode = 0;

            if ($combination % 3  !== 0) {
                $indexNode = 2;
                array_push($tabNodes, $indexNode);
            }
            do {

                if ($combination % 3 === 0) { // Branche de droit
                    $indexNode += 3;
                    array_push($tabNodes, $indexNode);
                } else { // Branche de gauche

                    if ($indexNode !== $combination) {
                        if ($indexNode % 3 === 0) {
                            $indexNode = $indexNode - 2;
                            if ($indexNode !== $combination) {
                                $indexNode = $indexNode + 3;
                                array_push($tabNodes, $indexNode);
                            }
                        }
                        if ($indexNode % 2 === 0 && $indexNode % 3 !== 0) {

                            if ($indexNode !== $combination) { //
                                $indexNode += 2;

                                if (isset($tabNodes[$indexNode-1])) {
                                    unset($tabNodes[$indexNode-1]);
                                }

                                array_push($tabNodes, $indexNode);
                            }

                            if ($indexNode !== $combination) {
                                $indexNode++;

                                if (isset($tabNodes[$indexNode-4])) {
                                    unset($tabNodes[$indexNode-4]);
                                }
                                array_push($tabNodes, $indexNode);
                            }

                        }
                        if ($indexNode % 2 === 1 && $indexNode % 3 !== 0) {

                            if ($indexNode !== $combination) {
                                if ($indexNode += 2 === $combination) {
                                    $indexNode += 2;
                                    array_push($tabNodes, $indexNode);
                                }

                            }
                            if ($indexNode !== $combination) {
                                unset($tabNodes[$indexNode-4]);
                                $indexNode++;
                                array_push($tabNodes, $indexNode);
                            }

                        }

                    }
                }

            } while ($indexNode !== $combination);
            array_unshift($tabNodes, 1);
            // $output[] = $tabNodes;

            $listNodesStr = implode('.', $tabNodes);
            if ($outputString) {
                $outputString = $outputString.", ".$listNodesStr;
            } else {
                $outputString = $listNodesStr;
            }

            unset($tabNodes);

        }
        return $outputString;
    }
}