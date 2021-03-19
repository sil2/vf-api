<?php

namespace Sil2\VfApi\Tests;

use Illuminate\Http\Response;
use Tests\TestCase;

class SampleTest extends TestCase
{

    const TEST_WIDGET_ID = 81;

    public function testApiAuth()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . getenv('API_TOKEN'))
            ->json('get', '/api/widget')
            ->assertStatus(200);
    }

    public function testApiNoAuth()
    {
        $response = $this->json('get', '/api/widget')
            ->assertStatus(401);
    }

    public function testwidgetCreate()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . getenv('API_TOKEN'))
            ->json('post', '/api/widget/', ['name' => 'test', 'description' => 'test'])
            ->assertJsonStructure(['message','id'])
            ->assertStatus(200);
    }

    public function testWidgetCreateMissingName()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . getenv('API_TOKEN'))
            ->json('post', '/api/widget', ['description' => 'test'])
            ->assertStatus(400);
    }

    public function testWidgetUpdate()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . getenv('API_TOKEN'))
            ->json('patch', '/api/widget/' . self::TEST_WIDGET_ID, ['name' => 'updated', 'description' => 'updated'])
            ->assertStatus(200);
    }

    public function testwidgetDelete()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . getenv('API_TOKEN'))
            ->json('delete', '/api/widget/' . self::TEST_WIDGET_ID)
            ->assertStatus(200);
    }
}
