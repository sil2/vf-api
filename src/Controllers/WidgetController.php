<?php

namespace Sil2\VfApi\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Response;
use Sil2\VfApi\Models\Widget;
use Sil2\VfApi\Resources\WidgetResource;
use Sil2\VfApi\Resources\WidgetResourceCollection;
use Validator;

class WidgetController
{

    /**
     * Index (not in use)
     * @TODO return some DOC here of use as autorization test.
     * @return json
     */
    public function index()
    {
        return Response::json('widgets API');
    }

    /**
     * Get all widgets
     * @param  Request $request
     * @return json WidgetsResourceCollection
     */
    public function all(Request $request)
    {
        $req = $request->all();
        $widgets = new Widget();
        return new WidgetResourceCollection($widgets->all());
    }

    /**
     * get widget by ID
     * @param  int $id
     * @return json WidgetsResource
     */
    public function get($id)
    {
        //@tODO add some id validation here
        //the best practice is to use a hashed ID not the real one
        WidgetResource::withoutWrapping();
        return new WidgetResource(Widget::findOrFail($id));
    }

    /**
     * create a new  widget
     * @param  json
     * @return json ['message','id']
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name"        => 'required|string|min:3|max:100',
            "description" => 'max:200'
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()->all()], 400);
        }

        $widget       = new Widget();
        $widget->name = $request->name;

        if ($request->description) {
            $widget->description = $request->description;
        }

        $widget->save();

        return response()->json(["message" => 'Created', 'id' => $widget->id]);
    }

    /**
     * update widget by id
     * @param  int id
     * @param  json
     * @return json ['message']
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name"        => 'string|min:3|max:100',
            "description" => 'max:200'
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()->all()], 400);
        }

        $widget = Widget::findOrFail($id);

        if ($request->name) {
            $widget->name = $request->name;
        }

        if ($request->description) {
            $widget->description = $request->description;
        }

        $widget->save();

        return response()->json(["message" => 'Updated']);
    }

    /**
     * delete widget by id
     * @param  int id
     * @return json ['message']
     */
    public function delete($id)
    {
        $widget = Widget::findOrFail($id);
        $widget->delete();
        return response()->json(["message" => 'Deleted']);
    }
}
