@extends('site.master.layout')

@section('content')


        <div class="row">
            <h2>Unidades Federativas Cadastradas</h2>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Sigla</th>
                        <th>Unidade Federativa</th>
                        <th>
                            <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#adduf"><i class="fas fa-plus"></i> Adicionar</button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($ufs as $uf)
                    <tr>
                    <td>{{ $uf->SGL_UNIDADE_FEDERATIVA }}</td>
                    <td>{{ $uf->NOM_UNIDADE }}</td>
                        <td>
                            <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#edit-{{ $uf->SGL_UNIDADE_FEDERATIVA }}"><i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#delete-{{ $uf->SGL_UNIDADE_FEDERATIVA }}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    <!-- Formulário de Cadastro de Unidades Federativas -->
    <form action="{{ route('site.uf') }}" class="form-validation" method="post" id="form-validate">
        <!-- The Modal -->
        @csrf
        <div class="modal fade" id="adduf">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastrar Unidade Federativa</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="sigla">Sigla:</label>
                            <input type="text" class="form-control" placeholder="Ex: SP" name="sigla" pattern="[A-Z]+$" minlength="2" maxlength="2">
                        </div>
                        <div class="form-group">
                            <label for="uf">Unidade Federativa:</label>
                            <input type="text" class="form-control" placeholder="Ex: São Paulo" name="uf" pattern="[A-Za-z ]+$" required>

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @foreach ($ufs as $uf)
    <!-- Formulário de Edição de Unidades Federativas -->
    <form action="{{ route("edit.uf", $uf->SGL_UNIDADE_FEDERATIVA) }}" class="form-validation" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="edit-{{ $uf->SGL_UNIDADE_FEDERATIVA }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Unidade Federativa</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="sigla">Sigla:</label>
                            <input type="text" class="form-control" name="sigla" value="{{ $uf->SGL_UNIDADE_FEDERATIVA }}" required>

                        </div>
                        <div class="form-group">
                            <label for="uf">Unidade Federativa:</label>
                            <input type="text" class="form-control" name="uf" value="{{ $uf->NOM_UNIDADE }}" required>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    <!--Espeficica o tipo de envio (verbo http)-->
                    <input type="hidden" name="_method" value="PUT">
                </div>
            </div>
        </div>
    </form>

    @endforeach

    @foreach ($ufs as $uf)

    <!-- Formulário de Remoção de Unidades Federativas -->
    <form action="{{ route("delete.uf", $uf->SGL_UNIDADE_FEDERATIVA) }}" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="delete-{{ $uf->SGL_UNIDADE_FEDERATIVA }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Remover Unidade Federativa</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="uf">Tem certeza que deseja remover <b>{{ $uf->NOM_UNIDADE }}-{{ $uf->SGL_UNIDADE_FEDERATIVA }} </b> ?</label>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                    <input type="hidden" name="_method" value="DELETE">
                </div>
            </div>
        </div>
    </form>
    @endforeach

@endsection
