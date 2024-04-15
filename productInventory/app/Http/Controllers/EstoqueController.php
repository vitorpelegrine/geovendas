<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function update(Request $request)
    {
        foreach ($request->json() as $item) {
            $product = Estoque::where('produto', $item['produto']);
            $product->produto = $item['produto'];
            $product->cor = $item['cor'];
            $product->tamanho = $item['tamanho'];
            $product->deposito = $item['deposito'];
            $product->data_disponibilidade = $item['data_disponibilidade'];
            $product->quantidade = $item['quantidade'];
            $product->save();
        }

        return response()->json(['message' => 'Produtos atualizados com sucesso!']);
    }

    public function create(Request $request)
    {
        foreach ($request->json() as $item) {
            $product = new Estoque;
            $product->produto = $item['produto'];
            $product->cor = $item['cor'];
            $product->tamanho = $item['tamanho'];
            $product->deposito = $item['deposito'];
            $product->data_disponibilidade = $item['data_disponibilidade'];
            $product->quantidade = $item['quantidade'];
            $product->save();
        }

        return response()->json(['message' => 'Produtos cadastrados com sucesso!']);
    }
}
