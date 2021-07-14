@extends('property.master')

@section('content')

<div class="container my-3">
  <h1>Edição de Imóvel</h1>

  <?php 
    $property = $property[0];
  ?>

  <form action="<?= url('/imoveis/update', ['id' => $property->id]); ?>" method="post">
    <?= csrf_field(); ?>
    <?= method_field('PUT'); ?>
    <div class="form-group">
      <label for="title">Título do Imóvel</label>
      <input type="text" name="title" id="title" value="<?= $property->title ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="desc">Descrição</label>
      <input type="text" name="desc" id="desc" value="<?= $property->description ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="alguel">Aluguel</label>
      <input type="text" name="alguel" id="alguel" value="<?= $property->rental_price ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="venda">Venda</label>
      <input type="text" name="venda" id="venda" value="<?= $property->sale_price ?>" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar Imóvel</button>
  </form>
</div>
@endsection