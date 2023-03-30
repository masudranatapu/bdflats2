<?php

namespace App\Models;

use DB;
use Str;
use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class FloorList extends Model
{
    use RepoResponse;
    public $timestamps = false;
    protected $table = 'prd_floor_list';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'is_active'];

    public function getFloorList() {
        return FloorList::where('is_active', 1)->pluck('name', 'id');
    }


    public function getFloors($limit = 2000): object
    {
        $floors = FloorList::orderBy('order_id', 'desc')->paginate($limit);
        return $this->formatResponse(true, '', '', $floors);
    }

    public function getFloor(int $id): object
    {
        $floor = FloorList::find($id);
        return $this->formatResponse(true, '', '', $floor);
    }

    public function storeFloor($request): object
    {
        $this->status = false;
        $this->msg = 'Floor not added!';

        DB::beginTransaction();
        try {
            $floor = new FloorList();
            $floor->name = $request->name;
            $floor->order_id = $request->order_id;
            $floor->is_active = $request->status;
            $floor->save();

            $this->status = true;
            $this->msg = 'Floor added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertyfloor.list');
    }


    public function updateFloor($request, int $id): object
    {
        $this->status = false;
        $this->msg = 'Floor not updated!';

        DB::beginTransaction();
        try {
            $floor = FloorList::find($id);
            $floor->name = $request->name;
            $floor->order_id = $request->order_id;
            $floor->is_active = $request->status;
            $floor->save();

            $this->status = true;
            $this->msg = 'Floor updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($this->status, $this->msg, 'admin.propertyfloor.list');
    }



}
