<?php

/* Verilerin gelip gelmediğini kontrol ettik. */
/* print_r($todos); */

?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Uygulaması</title>
    <?php $this->load->view("includes/style.php"); ?>
</head>

<body>

    <h3 class="text-center">Todo List Uygulaması</h3>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url("todo/insert"); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="description" class="form-control"
                                value="<?php echo isset($formError) ? set_value("description") : NULL; ?>"
                                placeholder="Yapılacak görevi buraya yazınız.">
                            <?php
                            if (isset($formError)) {
                                echo form_error("description");
                            }

                            ?>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="priority" id="" required>
                                <option value="">Seçim Yapınız</option>
                                <option value="0">Normal</option>
                                <option value="1">Acil</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-info"> Ekle </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <hr>

        <div class="row">

            <table class="table table-bordered table-hover table-striped">

                <thead>
                    <tr>
                        <td>Yapılacaklar</td>
                        <td>Öncelik</td>
                        <td>Durum</td>
                        <td>Oluşturulma Tarihi</td>
                        <td>İşlem</td>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($todos as $todo) { ?>
                        <tr id="t<?= $todo->id ?>" class="trow <?php echo ($todo->priority == 1) ? "bg-warning" : ""; ?>">
                            <td>
                                <?php echo $todo->description; ?>
                            </td>
                            <td>
                                <?php echo ($todo->priority == 1) ? "Acil" : "Normal"; ?>
                            </td>
                            <td>
                                <input type="checkbox" data-url="<?= base_url("todo/isActiveSetter/$todo->id") ?>"
                                    class="js-switch" <?php echo ($todo->is_active == 1) ? "checked" : ""; ?>>
                            </td>
                            <td>
                                <?php echo $todo->created_at; ?>
                            </td>
                            <td><a data-id="<?= $todo->id ?>" data-url="<?php echo base_url("todo/delete/$todo->id"); ?>"
                                    class="dltbtn btn btn-danger"> Sil </a></td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

        <div class="modal fade" id="confirmModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Silmek istediğinize emin misiniz?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Silmek istediğinizi onaylayın ya da vazgeçin. Bu işlem geri alınamaz.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                        <button type="button" id="delete" class="btn btn-danger">Sil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php $this->load->view("includes/script.php"); ?>

</body>

</html>