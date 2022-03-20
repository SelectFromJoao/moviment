<?php

namespace App\Repositories\Movement;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class MovementRepository
{

    public function getMovementsById(int $id) : Array{

        $movements = DB::table('personal_record')
            ->join('movement', 'movement.id', '=', 'personal_record.movement_id')
            ->join('user', 'user.id', '=', 'personal_record.user_id')
            ->select('movement.name', 'user.name as user-name', 'personal_record.value', 'personal_record.date')
            ->where('movement.id',$id)
            ->orderBy('personal_record.value', 'desc')
            ->orderBy('user.name', 'desc')
            ->get();

        return $movements->toArray();
    }

}
