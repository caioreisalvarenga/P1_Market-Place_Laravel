 <!-- Modal Structure -->
 <div id="delete-{{$produto->id}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i> Tem certeza ? </h4>
        <div class="row">  
            <p>Tem certeza que deseja excluir o produto {{$produto->nome}} ?</p>
        </div> 
       
        <form action="{{route('admin.produto.delete', $produto->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="waves-effect waves-green btn red right">Excluir</button><br>
        </form>
    </div>
</div>
  