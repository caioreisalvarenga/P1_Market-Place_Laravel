 <!-- Edit Modal -->
 <div id="modal-edit-{{ $produto->id }}" class="modal">
     <div class="modal-content">
         <!-- Add your edit form here -->
         <!-- For example: -->
         <form action="{{route('admin.produto.update', $produto->id)}}" method="POST" method="POST">
             @csrf
             @method('PUT')
             <!-- Add your form fields here -->
             <!-- For example: -->
             <input type="text" name="nome" value="{{ $produto->nome }}" required>
             <input type="number" name="preco" value="{{ $produto->preco }}" required>
             <input type="text" name="descricao" value="{{ $produto->descricao }}" required>
             <input type="text" name="imagem" value="{{ $produto->imagem }}">
             <!-- Add more fields if needed -->
             <button type="submit" class="btn">Editar</button>
         </form>
     </div>
 </div>