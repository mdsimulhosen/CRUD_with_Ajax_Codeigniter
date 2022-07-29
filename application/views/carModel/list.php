<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ajax Crud in Codeigniter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="p-4">
        <h4 class="w-75 mb-3">Car Model</h4>
        <button class="btn btn-primary float-end mb-3 modalbtn" data-bs-toggle="modal" data-bs-target="#addCarModal">Add Car</button>
        <table class="table table-hover table-bordered text-center bg-light">
            <thead>
                <th>Name</th>
                <th>Color</th>
                <th>Transmission</th>
                <th>Price</th>
                <th>Created Date</th>
                <th>Action</th>
                </th>
            </thead>
            <tbody>
                <?php
                if ($rows == true) {
                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->color; ?></td>
                            <td><?= $row->transmission; ?></td>
                            <td><?= $row->price; ?></td>
                            <td><?= $row->created_at; ?></td>
                            <td><?=
                                '
                                <button type="button" class="btn btn-primary"  onclick="editModal(' . $row->id . ')" style="padding: 8px; font-size: 18px;" id="editModal">Edit</button>
                                <button type="button" class="btn btn-danger"  onclick="delete_data(' . $row->id . ')" style="padding: 8px; font-size: 18px;" id="delete_data">Delete</button>
                                '
                                ?>
                            </td>
                        </tr>
                <?php }
                }else{
                    echo "No Data Found!";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- load boostrap  modal  =======================-->
    <?php $this->load->view('modal/carModal'); ?>

    <!-- javascript ================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>