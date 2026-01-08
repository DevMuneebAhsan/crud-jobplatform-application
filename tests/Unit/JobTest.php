<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    /** @test */
    public function it_belongs_to_an_employer()
    {
        // Arrange
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id,
        ]);

        // Act
        $retrievedEmployer = $job->employer;

        // Assert
        $this->assertTrue($retrievedEmployer->is($employer));
    }
}
