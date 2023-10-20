<?php

namespace App\Jobs;

use App\Models\CohortBill;
use App\Models\Student;
use App\Models\StudentBill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ForwardCohortBillToStudent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        CohortBill::where('billed', false)->chunk(100, function ($cohortBills) {
            foreach ($cohortBills as $cohortBill) {
                Student::where('cohort_id', $cohortBill->cohort_id)->chunk(100, function ($students) use ($cohortBill) {
                    foreach ($students as $student) {
                        StudentBill::create([
                            'student_id' => $student->id,
                            'title' => $cohortBill->title,
                            'cohort_bill_id' => $cohortBill->id,
                            'bill' => $cohortBill->bill,
                            'due_date' => $cohortBill->due_date
                        ]);
                    }
                });

                $cohortBill->update(['billed' => true]);
            }
        });
    }
}
