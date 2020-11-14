<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testErrorMinSymbolsForTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('idCategory', 1)
                ->type('source_id', 1)
                ->type('title', 'test')
                ->type('desc', 'test')
                ->type('body', 'test')
                ->type('is_private', 1)
                ->press('Добавить')
                ->assertSee('Количество символов в поле Заголовок должно быть не меньше 5 символов.')
                ->assertPathIs('/admin/news/create');
        });
    }
    public function testAddNews()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/admin/news/create')
                ->type('idCategory', 1)
                ->type('source_id', 1)
                ->type('title', 'test12345')
                ->type('desc', 'test')
                ->type('body', 'test')
                ->type('is_private', 1)
                ->press('Добавить')
                ->assertPathIs('/admin/news');
        });
    }
}
