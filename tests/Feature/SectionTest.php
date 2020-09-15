<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    
    public function testShowAllSections()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testshowSection()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSaveSection()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->json('POST', '/api/section', ['name' => 'Section 1']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => "Section successfully created.",
            ]);
    }

    public function testUpdateSection()
    {
        $section = factory(\App\Section::class)->create();
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->json('PATCH', '/api/section/'.$section->id, ['name' => 'Section update']);

        $response
            ->assertStatus(202)
            ->assertJson([
                'message' => "Section successfully updated.",
            ]);
    }

    public function testDeleteSection()
    {
        $section = factory(\App\Section::class)->create();
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->json("DELETE", '/api/section/'.$section->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "Section successfully deleted.",
            ]);
    }
}
