<?php

namespace App\services\Movement;


use App\Repositories\Movement\MovementRepository;

class MovementService
{
    public function getMovements(array $data) : array{
       $repository = new MovementRepository();
       $data = $repository->getMovementsById($data['id']);
       return  $this->applyRules($data);
    }

    private function applyRules(array $data) : array{
     
        $valuesFiltered = $this->filterDuplicatedUsers($data);

        return $this->setRankingPositions($valuesFiltered);
    }

    private function filterDuplicatedUsers(array $data) : array{
        $filterArray = [];
        $namesArray  = [];

        $array = json_decode(json_encode($data), true);
        foreach ($array as $value){
            if (!in_array($value['user-name'], $namesArray))
            {
                array_push($filterArray, $value);
                array_push($namesArray, $value['user-name']);
            }
        }

        return $filterArray;
    }

    private function setRankingPositions(array $data) : array{
        $rankingArray = [];
        $valuesArray  = [];
        $ranking = 0;
        
        foreach ($data as $value){

            if (!in_array($value['value'], $valuesArray))
            {
                $ranking++;
                $rankingArray[$ranking] = [];
                array_push($rankingArray[$ranking], $value);
                array_push($valuesArray, $value['value']);
            }
            else{
                array_push($rankingArray[$ranking], $value);
            }
        }

        return $rankingArray;
    }
}
