@extends('property.master')

@section('content')
<div class="container my-3">
  <h1>Listagem de Produtos</h1>

<?php 
  if (!empty($properties)) {

    echo "<table class='table table-striped table-cover'>";
    echo "
      <thead class='bg-primary text-white'>
        <td>Título</td>
        <td>Valor de Locação</td>
        <td>Valor de Compra</td>
        <td>Ações</td>
      </thead>
      ";
    foreach ($properties as $property) {
      $linkReadMore = url("/imoveis/" . $property->name);
      $linkEditItem = url("/imoveis/editar/" . $property->name);
      $linkRemoveItem = url("/imoveis/remover/" . $property->name);

      echo "
        <tr>
          <td>{$property->title}</td>
          <td>{$property->rental_price}</td>
          <td>{$property->sale_price}</td>
          <td>
            <a href='{$linkReadMore}'>Ler mais</a> | <a href='{$linkEditItem}'>Editar</a> | <a href='{$linkRemoveItem}'>Remover</a>
          </td>
        </tr>
      ";
    }
    
    echo "</table>";
  }
?>
</div>

@endsection