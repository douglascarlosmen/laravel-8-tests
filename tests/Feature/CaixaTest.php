<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Classes\Caixa;

class CaixaTest extends TestCase
{
    public function test_caixa_contem_item()
    {
        $caixa = new Caixa(['carro', 'mochila', 'garfo']);
        $this->assertTrue($caixa->contem('mochila'));
        $this->assertFalse($caixa->contem('cubo magico'));
    }

    public function test_caixa_contem_um_item()
    {
        $caixa = new Caixa(['lençol']);
        $this->assertEquals('lençol', $caixa->pegarUm());
    }

    public function test_item_comeca_com_a_letra()
    {
        $caixa = new Caixa(['cooler', 'mouse', 'fone', 'celular', 'notebook']);

        $results = $caixa->comecaCom('c'); // 2

        $this->assertCount(2, $results);
        $this->assertContains('cooler', $results);
        $this->assertContains('celular', $results);

        $this->assertEmpty($caixa->comecaCom('s'));
    }
}
