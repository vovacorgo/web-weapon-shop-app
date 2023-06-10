<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GoodRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GoodCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GoodCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Good::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/good');
        CRUD::setEntityNameStrings('good', 'goods');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('vendor_code');
        CRUD::column('title');
        CRUD::column('slug');
        CRUD::column('category_id');
        CRUD::column('brand_id');
        CRUD::column('description');
        CRUD::column('short_description');
        CRUD::column('warning_description');
        CRUD::column('old_price');
        CRUD::column('price');
        CRUD::column('quantity');
        CRUD::column('status');
        CRUD::column('options');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GoodRequest::class);

        CRUD::field('vendor_code');
        CRUD::field('title');
        CRUD::field('slug');
        CRUD::field('category_id');
        CRUD::field('brand_id');
        CRUD::field('description');
        CRUD::field('short_description');
        CRUD::field('warning_description');
        CRUD::field('old_price');
        CRUD::field('price');
        CRUD::field('quantity');
        CRUD::field('status');
        CRUD::field('options');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
