<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::insert([
            ['title' => 'Prepare project documentation', 'description' => 'Check the setup notes and organize the files for submission.', 'assigned_to' => 'Maria Angela M. Catangay', 'status' => 'in_progress', 'due_date' => now()->addDays(2)->toDateString(), 'is_archived' => false, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Review database records', 'description' => 'Verify the task fields and sample records before testing.', 'assigned_to' => 'Kenneth Mantes', 'status' => 'pending', 'due_date' => now()->addDays(3)->toDateString(), 'is_archived' => false, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Check notification flow', 'description' => 'Use the log mail driver and confirm the completion message is recorded.', 'assigned_to' => 'Gabriel Pelotenia', 'status' => 'pending', 'due_date' => now()->addDays(4)->toDateString(), 'is_archived' => false, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Proofread task labels', 'description' => 'Review the visible labels and form messages before submission.', 'assigned_to' => 'Cristine Mendoza', 'status' => 'done', 'due_date' => now()->subDay()->toDateString(), 'is_archived' => false, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
