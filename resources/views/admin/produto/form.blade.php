<div class="form-row">
 <div class="col-md-6 mb-5">
    <label for="">Código do Produto</label>
    <input type="text" class="form-control" placeholder="Ex: ABC-123" id="sku" name="sku" value="{{ @$produtos->sku }}">
  </div>
  <div class="col-md-6 mb-5">
    <label for="">Nome do Produto</label>
    <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome" value="{{ @$produtos->nome }}">
  </div>
  <div class="col-md-4 mb-5">
    <label for="">Valor Unitário</label>
    <input type="number" class="form-control" placeholder="" id="valorUnitario" name="valorUnitario" value="{{ @$produtos->valorUnitario }}">
  </div>
  <div class="col-md-5 mb-5">
    <label for="">Tipo da unidades vendida</label>
    <select class="form-control" id="UnidadeVenda" name="UnidadeVenda">
      @foreach ($tipoUnid as $tipoUnids)        
          @If ($tipoUnids === @$produtos->UnidadeVenda)
            <option selected> {{ @$produtos->UnidadeVenda }} </option>
          @endif
          <option> {{ $tipoUnids }} </option>      
          
      @endforeach
    </select>
  </div>
  <div class="col-md-5 mb-5">
      <button class="btn btn-primary" type="submit">Salvar</button>
</div>
</div>
