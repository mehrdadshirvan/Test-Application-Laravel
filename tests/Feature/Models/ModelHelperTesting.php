<?php

namespace Tests\Feature\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

trait ModelHelperTesting
{
    abstract protected function model() : Model;

    public function test_insert_data(): void
    {
        $model = $this->model();
        $table = $model->getTable();

        $data = $model::factory()->make()->toArray();
        $model::create($data);
        $this->assertDatabaseHas($table, $data);
    }

}
