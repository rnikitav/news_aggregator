<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNotAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('name', 't')
                ->press('Добавить')
                ->assertPathIsNot('/admin/categories');
        });
    }
    public function testAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('name', 'test')
                ->press('Добавить')
                ->assertPathIs('/admin/categories');
        });
    }
}
