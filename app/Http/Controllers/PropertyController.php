<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaraDev\Property;

class PropertyController extends Controller
{
    public function index() {
        // $properties = DB::select('SELECT * FROM properties');

        $properties = Property::all();

        return view('property.index')->with('properties', $properties);
    }

    public function show($name) {
        // $property = DB::select('SELECT * FROM properties WHERE name = ?', [$name]);

        $property = Property::where('name', $name)->get();

        if (!empty($property)) {
            return view('property.show')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }

    public function create() {
        return view('property.create');
    }

    public function store(Request $request) {

        $propertySlug = $this->setName($request->title);

        // $properties = [
        //     $request->title,
        //     $request->desc,
        //     $request->alguel,
        //     $request->venda,
        //     $propertySlug,
        // ];

        // DB::insert('INSERT INTO properties (title, description, rental_price, sale_price, name) values (?, ?, ?, ?, ?)', $properties);

        $property = [
            'title' => $request->title,
            'description' => $request->desc,
            'rental_price' => $request->alguel,
            'sale_price' => $request->venda,
            'name' => $propertySlug,
        ];

        Property::create($property);

        return redirect()->action('PropertyController@index');
    }

    public function edit($name) {
        // $property = DB::select('SELECT * FROM properties WHERE name = ?', [$name]);

        $property = Property::where('name', $name)->get();

        if (!empty($property)) {
            return view('/property.edit')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }

    public function update(Request $request, $id) {
        $propertySlug = $this->setName($request->title);

        // $properties = [
        //     $request->title,
        //     $request->desc,
        //     $request->alguel,
        //     $request->venda,
        //     $propertySlug,
        //     $id,
        // ];

        // DB::update('UPDATE properties SET title = ?, description = ?, rental_price = ?, sale_price = ?, name = ? WHERE id = ?', $properties);

        $property = Property::find($id);

        $property->title = $request->title;
        $property->name = $propertySlug;
        $property->description = $request->desc;
        $property->rental_price = $request->alguel;
        $property->sale_price = $request->venda;

        $property->save();

        return redirect()->action('PropertyController@index');
    }


    public function destroy($name) {
        // $property = DB::select('SELECT * FROM properties WHERE name = ?', [$name]);

        $property = Property::where('name', $name)->get();

        if (!empty($property)) {
            DB::delete('DELETE FROM properties WHERE name = ?', [$name]);
            return redirect()->action('PropertyController@index');
        }
    }

    private function setName ($title) {
        $propertySlug = str_slug($title);

        $properties = DB::select('SELECT * FROM properties');

        $t = 0;
        foreach ($properties as $property) {
            if (str_slug($property->title) === $propertySlug) {
                $t++;
            }
        }

        if ($t > 0) {
            $propertySlug = $propertySlug . '-' . $t;
        }

        return $propertySlug;
    }
}
