<?php
namespace App\Bitm\SEIP133704\OrganizationSummary;

class Summary
{
    public $id  = "";
    public $title = "";
    public $created = "";
    public $created_by = "";
    public $modified = "";
    public $modified_by = "";
    public $deleted_at = "";

    public function __construct($summary = false)
    {

    }

    public function index()

    {
        echo "I am listing Data";

    }

    public function create()
    {
        echo "I am create form";

    }
    public function store()
    {
        echo "I am storing data";

    }
    public function edit()
    {
        echo "I am editing data";

    }
    public function view()
    {
        echo "I am viewing data";

    }
    public function update()
    {
        echo "I am updating data";

    }
    public function delete()
    {
        echo "I delete data";

    }
}
