<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class MigrationController extends Controller
{
    public function createAndRunMigration(): RedirectResponse
    {
        // Step 1: Generate a migration name dynamically
        $migrationName = 'add_custom_column_to_children_table';
        Artisan::call('make:migration', [
            'name' => $migrationName,
            '--table' => 'children', // Specify the table name
        ]);

        // Step 2: Get the latest migration file that was just created
        $migrationFile = $this->getLatestMigrationFile($migrationName);
        if (!$migrationFile) {
            return redirect('/')->with('error', 'Migration file not found!');
        }

        // Step 3: Define the column name (ensuring consistency)
        $columnName = 'test_' . Carbon::now()->format('Y_m_d');

        // Step 4: Define the migration content
        $migrationContent = <<<PHP
        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        return new class extends Migration {
            public function up()
            {
                Schema::table('children', function (Blueprint \$table) {
                    \$table->string('$columnName')->nullable(); // Hardcoded column name
                });
            }

            public function down()
            {
                Schema::table('children', function (Blueprint \$table) {
                    \$table->dropColumn('$columnName'); // Use the same column name
                });
            }
        };
        PHP;

        //dd($migrationContent);
        // Step 5: Write the content into the migration file
        File::put($migrationFile, $migrationContent);

        // Step 6: Run the migration
        Artisan::call('migrate', ['--force' => true]);

        // Step 7: Redirect to home with a success message
        return redirect('/')->with('message', "Migration was created and executed successfully! Column: $columnName");
    }

    // Helper function to find the latest migration file
    private function getLatestMigrationFile($migrationName)
    {
        $migrationsPath = database_path('migrations');
        $files = glob("$migrationsPath/*_$migrationName.php");
        return $files ? $files[0] : null;
    }
}
