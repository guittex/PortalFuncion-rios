<!-- Modal -->
<div class="modal fade" id="adicionarNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style='border-radius:20px'>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Notícia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('noticias.adicionar') }}" method='POST' >
            {{ csrf_field() }}

            <div class="modal-body">
                <div class="form-group">
                    <label for="Título">Título</label>
                    <input type="text" class="form-control" name='titulo' id="tituloInput" placeholder='Digite um titulo para notícia...'>
                </div>
                <div class="form-group">
                    <label for="Sub-Titulo">Sub-Titulo</label>
                    <input type="text" class="form-control" name='subTitulo' id="subTituloInput" placeholder='Digite um sub titulo para notícia...'>
                    <small id="emailHelp" class="form-text text-muted">Este campo é opcional.</small>
                </div>
                <div class="form-group">
                    <label for="Sub-Titulo">Mensagem</label>
                    <textarea type="text" class="form-control" name='corpo' height=500 id="subTituloInput" placeholder='Digite o corpo da notícia...'></textarea>
                </div>                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>

        </div>
    </div>
</div>
