<div class="modal fade" id="CarModal" tabindex="-1" aria-labelledby="CarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="item-title" id="CarModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createCarModel" name="creatCarModel">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editID" value="0">
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Color</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Transmission</label>
                        <select class="form-control" name="transmission" id="transmission">
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="insert_data()" id="btnsave"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.modalbtn').click(function() {
        $("#CarModal").modal('show');
        $("#btnsave").html('Insert');
        $(".item-title").html('Add Car Modal');
        erase_data();
    });

    function insert_data() {
        $("#CarModal").modal('hide');
        var id = $("#editID").val();
        var name = $("#name").val();
        var color = $("#color").val();
        var transmission = $("#transmission").val();
        var price = $("#price").val();

        if (id == 0) {
            $.ajax({
                url: "<?php echo base_url("index.php/CarModel/insert_data") ?>",
                type: "POST",
                dataType: "html",
                data: {
                    id: id,
                    name: name,
                    color: color,
                    transmission: transmission,
                    price: price
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    // set_alert(data.set_alert, data.message);
                    erase_data();
                }
            });
        } else {
            $.ajax({
                url: "<?php echo base_url("index.php/CarModel/update_data/") ?>" + id,
                type: "POST",
                dataType: "html",
                data: {
                    id: id,
                    name: name,
                    color: color,
                    transmission: transmission,
                    price: price
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    erase_data();
                }
            });
            $("#CarModal").modal('hide');
        }
    }

    function editModal(id) {
        $("#CarModal").modal("show");
        $("#btnsave").html('Update');
        $(".item-title").html('Update Car Modal');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("index.php/CarModel/editdata/") ?>" + id,
            dataType: "html",
            data: {
                id: id,
            },
            success: function(response) {
                var data = JSON.parse(response);
                $("#editID").val(data.id);
                $("#name").val(data.name);
                $("#color").val(data.color);
                $("#transmission").val(data.transmission);
                $("#price").val(data.price);
            }
        });
    }

    // Data Delete from table 
    function delete_data(id) {
        $.ajax({
            url: "<?= base_url() . "index.php/CarModel/delete_data/"?>" + id,
            type: "POST",
            data: {
                id: id
            }
        });
    }

    function erase_data() {
        $("#name").val('');
        $("#color").val('');
        $("#price").val('');
    }
</script>