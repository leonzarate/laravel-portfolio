<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Project;
use Carbon\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_projects()
    {
        $this->withExceptionHandling();
        
        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
    }

    public function test_can_see_individual_projects()
    {
/*         $project = Project::create([
            'title' => 'Mi proyectos de Test1',
            'url' => 'mi-segundo-proyecto-test111',
            'description' => 'Descripcion Mi proyectos de Test1'
        ]);

        $project2 = Project::create([
            'title' => 'Mi proyectos de Test2',
            'url' => 'mi-segundo-proyecto-test222',
            'description' => 'Descripcion Mi proyectos de Test22'
        ]); */

        //Setup
        $project1 = Project::factory(Project::class)->create();
        $project2 = Project::factory(Project::class)->create();
        
        //Action
        $response = $this->get(route('projects.show', $project1));

        //Assert
        $response->assertStatus(200);
        $response->assertSee($project1->title);
        $response->assertDontSee($project2->title);

    }
}
