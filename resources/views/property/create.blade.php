@extends('property.master')

@section('content')

<div class="container my-3">
  <h1>Cadastro de Imóvel</h1>

  <form action="<?= url('/imoveis/store'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group">
      <label for="title">Título do Imóvel</label>
      <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
      <label for="desc">Descrição</label>
      <input type="text" name="desc" id="desc" class="form-control">
    </div>
    <div class="form-group">
      <label for="alguel">Aluguel</label>
      <input type="text" name="alguel" id="alguel" class="form-control">
    </div>
    <div class="form-group">
      <label for="venda">Venda</label>
      <input type="text" name="venda" id="venda" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar Imóvel</button>
  </form>
</div>
@endsection