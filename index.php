<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sistema-de-Gerenciamento-de-Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-boxes">
                        <path fill-rule="evenodd" d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"></path>
                    </svg></span><span class="text-white">Gerenciador de Produtos</span></a></div>
    </nav>
    <div style="margin: 5px;margin-top: 10px;">
        <p>Veja os Produtos, edite-os ou exclua-os.</p><button class="btn btn-primary" id="atualizar_lista" type="button" data-bs-toggle="tooltip" title="Atualize a lista de Produtos" style="margin: 5px;" onclick="atualizaListaProdutos();"><i class="fas fa-redo" style="margin-right: 5px;"></i>Atualizar lista</button><button class="btn btn-secondary" id="cadastrar_produto" type="button" data-bs-toggle="tooltip" title="Cadastre um novo Produto" style="margin: 5px;" onclick="showModalNovo();"><i class="fas fa-plus" style="margin-right: 5px;"></i>Cadastrar novo Produto</button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-dark table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código&nbsp;</th>
                    <th>Nome<strong>&nbsp;do Produto</strong><br></th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$id_produto</td>
                    <td>$cod_produto</td>
                    <td>$nome_produto</td>
                    <td>$qtd_produto</td>
                    <td>$valor_produto</td>
                    <td>$subtotal_produto</td>
                    <td><button class="btn btn-info" id="editar_produto" type="button" style="margin: 5px;margin-left: 5px;width: 44px;height: 38px;" data-bs-toggle="tooltip" title="Edite o Produto" onclick="showModalEdit(&#39;$id_produto&#39;);"><i class="far fa-edit"></i></button><button class="btn btn-danger" id="excluir_produto" type="button" style="margin: 5px;margin-left: 5px;width: 44px;height: 38px;" data-bs-toggle="tooltip" title="Exclua o produto" onclick="showModalDelete(&#39;$id_produto&#39;);"><i class="far fa-trash-alt"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal_editar_produto">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Produto</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_edit_produto">
                        <div><span>Código do Produto</span><input class="form-control" type="text" style="max-width: 150px;" required="" name="codigo_produto"></div>
                        <div><span>Nome do Produto</span><input class="form-control" type="text" required="" style="max-width: 350px;" name="nome_produto"></div>
                        <div><span>Quantidade</span><input class="form-control" type="text" style="max-width: 140px;" inputmode="numeric" required="" pattern="^([0-9]*)?$" name="quantidade_produto">
                            <div style="padding: 5px;padding-right: 0;padding-left: 0;margin-top: -11px;"><span style="font-size: 12px;">Formato aceito: somente números inteiros.&nbsp;Ex: 12</span></div>
                        </div>
                        <div><span>Preço unitário</span><input class="form-control" type="text" style="max-width: 200px;" inputmode="numeric" required="" pattern="^[1-9]\d*(,[0-9]{1,2})?$" name="preco_unitario">
                            <div style="padding: 5px;padding-right: 0;padding-left: 0;margin-top: -11px;"><span style="font-size: 12px;">Formato aceito: números e vírgula. Ex: 10,25</span></div>
                        </div>
                        <div><span>Subtotal</span><input class="form-control" type="text" style="max-width: 200px;" inputmode="numeric" required="" pattern="^[1-9]\d*(,[0-9]{1,2})?$" name="subtotal_produto">
                            <div style="padding: 5px;padding-right: 0;padding-left: 0;margin-top: -11px;"><span style="font-size: 12px;">Formato aceito: números e vírgula. Ex: 10,25</span></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-primary" type="submit" form="form_edit_produto">Salvar</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal_novo_produto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal_deletar_produto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>