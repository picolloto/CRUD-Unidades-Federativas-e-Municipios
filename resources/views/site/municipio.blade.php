@extends('site.master.layout')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Municípios Cadastrados</h2>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Unidade Federativa</th>
                        <th>Município</th>
                        <th>População</th>
                        <th>Prefeito</th>
                        <th>
                            <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#addMunicipio"><i class="fas fa-plus"></i> Adicionar</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($municipio as $country)
                        <tr>
                            <td>{{ $country->SGL_UNIDADE_FEDERATIVA }}</td>
                            <td>{{ $country->NOM_MUNICIPIO }}</td>
                            <td>{{ $country->NUM_POPULACAO }}</td>
                            <td>{{ $country->NOM_PREFEITO }}</td>
                            <td>
                            <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#edit-{{ $country->COD_MUNICIPIO }}"><i class="far fa-edit"></i></button>
                                <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#delete-{{ $country->COD_MUNICIPIO }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Formulário de Cadastro de Municípios -->
<form  action="{{ route('store.municipio') }}" class="form-validation" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="addMunicipio">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cadastrar Município</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="uf">Unidade Federativa:</label>
                                <select class="form-control" name="uf" required>
                                  @foreach ($ufs as $uf)
                                    <option>{{ $uf->SGL_UNIDADE_FEDERATIVA }}</option>
                                  @endforeach
                            </select>
                            </div>
                            <div class="form-group  col-sm-8">
                                <label for="municipio">Município:</label>
                                <input type="text" class="form-control" placeholder="Ex: Sinop" name="municipio" pattern="[A-Za-z ]+$" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="populacao">População:</label>
                                <input type="number" class="form-control" placeholder="Ex: 100000" pattern="[0-9]+$" name="populacao" required>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="prefeito">Prefeito:</label>
                                <input type="text" class="form-control" placeholder="Ex: João Paulo" name="prefeito" pattern="[A-Za-z ]+$" required>
                            </div>
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

    @foreach ($municipio as $country)
    <!-- Formulário de Edição de Municípios -->
<form action="{{ route('edit.municipio', $country->COD_MUNICIPIO) }}" class="form-validation" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="edit-{{ $country->COD_MUNICIPIO }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Município</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="uf">Unidade Federativa:</label>
                                <select class="form-control" name="uf" required>
                                    @foreach ($ufs as $uf)
                                        <option
                                            @if($uf->SGL_UNIDADE_FEDERATIVA === $country->SGL_UNIDADE_FEDERATIVA) selected="selected"
                                            @endif> {{ $uf->SGL_UNIDADE_FEDERATIVA }} </option>
                                    @endforeach
                            </select>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="municipio">Município:</label>
                                <input type="text" class="form-control" name="municipio" pattern="[A-Za-z ]+$" value="{{ $country->NOM_MUNICIPIO }}" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="populacao">População:</label>
                                <input type="number" class="form-control" name="populacao" pattern="[0-9]+$" value="{{ $country->NUM_POPULACAO }}" required>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="prefeito">Prefeito:</label>
                                <input type="text" class="form-control" name="prefeito" pattern="[A-Za-z ]+$" value="{{ $country->NOM_PREFEITO }}" required>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
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
    @endforeach

    @foreach ($municipio as $country)

    <!-- Formulário de Remoção de Municípios -->
<form action="{{ route('delete.municipio', $country->COD_MUNICIPIO) }}" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="delete-{{ $country->COD_MUNICIPIO }}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Remover Município</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="uf">Tem certeza que deseja remover <b> {{ $country->NOM_MUNICIPIO }} - {{ $country->SGL_UNIDADE_FEDERATIVA }} </b> ?</label>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                    <input type="hidden" name="_method" value="DELETE"/>
                </div>
            </div>
        </div>
    </form>
    @endforeach
@endsection
