<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getCatalog()
    {
        $data = Catalog::get();

        if (!$data) {
            return $this->responseError("Failed get data", "Something went wrong");
        }
        return $this->responseSuccess("Succesfully get data", $data);
    }

    public function createCatalog(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->responseError("Data not valid", $validate->errors()->first());
        }

        $req = $request->all();
        $catalog = new Catalog();

        foreach ($req as $key => $values) {
            $catalog[$key] = $values;
        }

        if ($catalog->save()) {
            $data = Catalog::where('id', $catalog['id'])->get();
            return $this->responseSuccess('Success create data', $data);
        } else {
            return $this->responseError('Failed create data', 'Failed create data');
        }
    }

    public function updateCatalog(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return $this->responseError("Data not valid", $validate->errors()->first());
        }


        $update = Catalog::where('id', $id)->update([
            'name' => $request->name
        ]);
        if ($update) {
            $data = Catalog::where('id', $id)->get();
            return $this->responseSuccess('Success update catalog', $data);
        } else {
            return $this->responseError('Failed update catalog', 'Nothing to update');
        }
    }

    public function deleteCatalog($id)
    {
        $delete = Catalog::where('id', $id)->delete();
        if ($delete) {
            return $this->responseSuccess("Success delete catalog", "");
        } else {
            return $this->responseError("Failed delete catalog", "");
        }
    }
}
