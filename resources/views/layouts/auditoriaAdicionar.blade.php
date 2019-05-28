<!-- Modal -->
<div class="modal fade" id="adicionarAuditoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style='border-radius:20px'>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Auditoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('auditoria.adicionar') }}" method='POST' >
            {{ csrf_field() }}

            <div class="modal-body">
                @if(Auth::check())
                <input type='hidden' name='criado_em' value='{{ Auth::user()->name }}'>
                @endif
                <div class="form-group">
                    <label for="Título">Título</label>
                    <input type="text" class="form-control" name='titulo' id="tituloInput" placeholder='Digite um titulo...'>
                </div>
                <div class="form-group">
                    <label for="Data">Data</label>
                    <input type="text" class="form-control" name='data' id="dataInput" placeholder='Digite uma data...'>
                    <small id="emailHelp" class="form-text text-muted">Este campo é opcional.</small>
                </div>
                <div class="form-group">
                    <label for="Referência">Referência</label>
                    <input type="text" class="form-control" name='referencia' height=500 id="referenciaInput" placeholder='Digite uma referência...'>
                </div>      
                <div class="form-group">
                    <label for="Setor">Setores Destinados</label>
                    <input type="text" class="form-control" name='usuarios' height=500 id="usuariosInput" placeholder='Digite os setores destinados...'>
                </div>
                <div class="form-group">
                    <label for="Descrição">Descrição</label>
                    <textarea type="text" class="form-control" name='descricao' height=500 id="descricaoInput" placeholder='Digite as descrições...'></textarea>
                </div>    
                <div class="form-group">
                    <label for="Responsabilidades">Responsabilidades</label>
                    <textarea type="text" class="form-control" name='resposabilidades' height=500 id="resposabilidadesInput" placeholder='Digite as responsabilidades...'></textarea>
                </div>  
                <div class="form-group">
                    <label for="Objetivo">Objetivo</label>
                    <textarea type="text" class="form-control" name='objetivo' height=500 id="objetivoInput" placeholder='Digite um objetivo...'></textarea>
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
