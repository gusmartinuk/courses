<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;
use App\Models\User;

class CourseTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_it_can_create_a_course()
    {
        $user = User::factory()->create(); // Replace with your User model
        $test=true;
        // Simulate authentication for the user
        $this->actingAs($user);
        $response = $this->get('/dashboard');
        print("step 1");
        dump($response->status());
        $response->assertStatus(200);

        print("step 2");

        $courseData = [
            'name' => $this->faker->sentence,
            'status' => 'preparing',
        ];

        $response = $this->post(route('courses.store'), $courseData);
        // dd($response);

        $response->assertStatus(301); // Check the correct post status
        $this->assertCount(1, Course::all());
    }
}



