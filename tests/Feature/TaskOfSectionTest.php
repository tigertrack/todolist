<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskOfSectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTaskOfSectionRelationship()
    {
        $section = factory(\App\Section::class)->create();
        $task = factory(\App\Task::class)->create(['section_id' => $section->id]);
        $sectiontask = \App\section::with('tasks')->find($section->id);
        $this->assertInstanceOf('App\Task', $sectiontask->tasks->first());
    }
}
