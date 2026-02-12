<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\Contato;

class ContatoIndexPerformanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_contatos_index_query_uses_index_for_sorting()
    {
        // Run the query that ContatoController::index uses:
        // Contato::latest()->paginate(5);

        $query = Contato::latest()->take(5);
        $sql = $query->toSql();
        $bindings = $query->getBindings();

        $plan = DB::select('EXPLAIN QUERY PLAN ' . $sql, $bindings);

        $details = '';
        foreach ($plan as $row) {
            $details .= $row->detail . "\n";
        }

        // We expect the query to use an index to avoid sorting (USE TEMP B-TREE FOR ORDER BY)
        // When indexed, SQLite usually says "SCAN contatos USING INDEX ..."

        $this->assertStringContainsString('USING INDEX', $details, "Query is not using an index. Plan details: \n" . $details);
    }
}
