<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        /* Custom styles */
        body {
            background-color: lightblue; /* Light blue background */
            color: blue; /* Blue text color */
        }
        .card {
            border-radius: 15px; /* Rounded corners */
        }
        .card-header {
            text-align: center; /* Center the header */
        }
        .card-body {
            text-align: center; /* Center the content */
        }
        table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 15px; /* Rounded corners */
        }
        th, td {
            padding: 8px; /* Increase padding */
        }
    </style>
</head>
<body>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title">Sales Report</h5> <!-- Moved sales report text to the middle -->
        </div>
        <div class="card-body">
            <form id="filter-form">
                <!-- Your form code here -->
                <div class="row align-items-end">
                    <div class="form-group col-md-3">
                        <label for="date_start">Date Start</label>
                        <input type="date" class="form-control form-control-sm" name="date_start" value="<?php echo date("Y-m-d",strtotime($date_start)) ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="date_start">Date End</label>
                        <input type="date" class="form-control form-control-sm" name="date_end" value="<?php echo date("Y-m-d",strtotime($date_end)) ?>">
                    </div>
                    <div class="form-group col-md-1">
                        <button class="btn btn-flat btn-block btn-primary btn-sm"><i class="fa fa-filter"></i> Filter</button>
                    </div>
                    <div class="form-group col-md-1">
                        <button class="btn btn-flat btn-block btn-success btn-sm" type="button" id="printBTN"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </form>
            <hr>
            <div id="printable">
                <!-- Your table code here -->
                <table class="table table-bordered">
                    <colgroup>
                        <col width="5">
                        <col width="10">
                        <col width="10">
                        <col width="10">
                        <col width="10">
                        <col width="10">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Time</th>
                            <th>Product</th>
                            <th>Client</th>
                            <th>QTY</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                            $qry = $conn->query("SELECT * FROM `sales` where date(date_created) between '{$date_start}' and '{$date_end}' order by unix_timestamp(date_created) desc ");
                            while($row = $qry->fetch_assoc()):
                                $olist = $conn->query("SELECT ol.*,p.name,b.name as bname,concat(c.firstname,' ',c.lastname) as name,c.email,o.date_created FROM order_list ol inner join orders o on o.id = ol.order_id inner join `products` p on p.id = ol.product_id inner join clients c on c.id = o.client_id inner join brands b on p.brand_id = b.id  where ol.order_id = '{$row['order_id']}' ");
                                while($roww = $olist->fetch_assoc()):
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++ ?></td>
                            <td><?php echo $row['date_created'] ?></td>
                            <td>
                                <p class="m-0"><?php echo $roww['name'] ?></p>
                                <p class="m-0"><small>brand: <?php echo $roww['bname'] ?></small></p>
                            </td>
                            <td>
                                <p class="m-0"><?php echo $roww['name'] ?></p>
                                <p class="m-0"><small>Email: <?php echo $roww['email'] ?></small></p>
                            </td>
                            <td class="text-center"><?php echo $roww['quantity'] ?></td>
                            <td class="text-right"><?php echo number_format($roww['quantity'] * $roww['price']) ?></td>
                        </tr>

                        <?php endwhile; ?>
                        <?php endwhile; ?>
                        <?php if($qry->num_rows <= 0): ?>
                        <tr>
                            <td class="text-center" colspan="6">No Data...</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
