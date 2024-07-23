<?php
session_start();
include("dbconn.php");

// Check if the customer is logged in and if orderID is set
if (!isset($_SESSION["custID"]) || !isset($_GET["orderID"])) {
    header("Location: AccessTEST2.php");
    exit();
}

$c_id = $_SESSION['custID'];
$o_id = $_GET['orderID'];

// Fetch the order package details
$orderPackage_sql = "SELECT * FROM orderPackage WHERE custID = ? AND orderID = ?";
$stmt = $dbconn->prepare($orderPackage_sql);
$stmt->bind_param("ss", $c_id, $o_id);
$stmt->execute();
$orderPackage_result = $stmt->get_result();
$orderPackage = $orderPackage_result->fetch_assoc();
$stmt->close();

// Check if the order package exists
if ($orderPackage) {
    // Fetch the customer details
    $customer_sql = "SELECT * FROM customer WHERE custID = ?";
    $stmt = $dbconn->prepare($customer_sql);
    $stmt->bind_param("s", $c_id);
    $stmt->execute();
    $customer_result = $stmt->get_result();
    $customer = $customer_result->fetch_assoc();
    $stmt->close();

    // Fetch package details (Assuming there is a package table with package details)
    $packageID = $orderPackage['packageID'];
    $package_sql = "SELECT * FROM package WHERE packageID = ?";
    $stmt = $dbconn->prepare($package_sql);
    $stmt->bind_param("s", $packageID);
    $stmt->execute();
    $package_result = $stmt->get_result();
    $package = $package_result->fetch_assoc();
    $stmt->close();
} else {
    echo "No order package found for the given order ID.";
    exit();
}

// Display the invoice details
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
            *,
        *::after,
        *::before{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        :root{
            --blue-color: #7ab2b2;
            --dark-color: #535b61;
            --white-color: #fff;
            --btn-hover-color: #519a9a;
        }

        ul{
            list-style-type: none;
        }
        ul li{
            margin: 2px 0;
        }

        /* text colors */
        .text-dark{
            color: var(--dark-color);
        }
        .text-blue{
            color: var(--blue-color);
        }
        .text-end{
            text-align: right;
        }
        .text-center{
            text-align: center;
        }
        .text-start{
            text-align: left;
        }
        .text-bold{
            font-weight: 700;
        }
        /* hr line */
        .hr{
            height: 1px;
            background-color: rgba(0, 0, 0, 0.1);
        }
        /* border-bottom */
        .border-bottom{
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        body{
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
            font-size: 14px;
        }
        .invoice-wrapper{
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.1);
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .invoice{
            max-width: 850px;
            margin-right: auto;
            margin-left: auto;
            background-color: var(--white-color);
            padding: 70px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            min-height: 920px;
        }
        .invoice-head-top-left img{
            width: 130px;
        }
        .invoice-head-top-right h3{
            font-weight: 500;
            font-size: 27px;
            color: var(--blue-color);
        }
        .invoice-head-middle, .invoice-head-bottom{
            padding: 16px 0;
        }
        .invoice-body{
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            overflow: hidden;
        }
        .invoice-body table{
            border-collapse: collapse;
            border-radius: 4px;
            width: 100%;
        }
        .invoice-body table td, .invoice-body table th{
            padding: 12px;
        }
        .invoice-body table tr{
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .invoice-body table thead{
            background-color: rgba(0, 0, 0, 0.02);
        }
        .invoice-body-info-item{
            display: grid;
            grid-template-columns: 80% 20%;
        }
        .invoice-body-info-item .info-item-td{
            padding: 12px;
            background-color: rgba(0, 0, 0, 0.02);
        }
        .invoice-foot{
            padding: 30px 0;
        }
        .invoice-foot p{
            font-size: 12px;
        }
        .invoice-btns{
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .invoice-btn{
            padding: 10px 20px;
            color: var(--white-color);
            font-family: inherit;
            background-color: var(--blue-color);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }
        .invoice-btn:hover{
            background-color: var(--btn-hover-color);
        }

        .invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            padding-bottom: 10px;
        }

        @media screen and (max-width: 992px){
            .invoice{
                padding: 40px;
            }
        }

        @media screen and (max-width: 576px){
            .invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
                grid-template-columns: repeat(1, 1fr);
            }
            .invoice-head-bottom-right{
                margin-top: 12px;
                margin-bottom: 12px;
            }
            .invoice *{
                text-align: left;
            }
            .invoice{
                padding: 28px;
            }
        }

        .overflow-view{
            overflow-x: scroll;
        }
        .invoice-body{
            min-width: 600px;
        }

        @media print{
            .print-area{
                visibility: visible;
                width: 100%;
                position: absolute;
                left: 0;
                top: 0;
                overflow: hidden;
            }

            .overflow-view{
                overflow-x: hidden;
            }

            .invoice-btns{
                display: none;
            }
        }
    </style>
</head> 
<body>
    <div class="invoice-wrapper" id="print-area">
        <div class="invoice">
            <div class="invoice-container">
                <div class="invoice-head">
                    <div class="invoice-head-top">
                        <div class="invoice-head-top-left text-start">
                            <img src="kiddosmart.jpg" width="100" height="60" alt="KiddoSmart">
                        </div>
                        <div class="invoice-head-top-right text-end">
                            <h3>Invoice</h3>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-middle">
                        <div class="invoice-head-middle-left text-start">
                            <p><span class="text-bold">Date:</span> <?php echo isset($orderPackage['orderDate']) ? $orderPackage['orderDate'] : 'N/A'; ?></p>
                        </div>
                        <div class="invoice-head-middle-right text-end">
                            <p><span class="text-bold">Order ID:</span> <?php echo isset($orderPackage['orderID']) ? $orderPackage['orderID'] : 'N/A'; ?></p>
                            <p><span class="text-bold">Package ID:</span> <?php echo isset($orderPackage['packageID']) ? $orderPackage['packageID'] : 'N/A'; ?></p>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-bottom">
                        <div class="invoice-head-bottom-left">
                            <ul>
                                <li class='text-bold'>Invoiced To:</li>
                                <li><?php echo isset($customer) ? $customer['cust_firstName'] . " " . $customer['cust_lastName'] : 'N/A'; ?></li>
                                <li><?php echo isset($customer['cust_phoneNum']) ? $customer['cust_phoneNum'] : 'N/A'; ?></li>
                                <li><?php echo isset($customer['cust_email']) ? $customer['cust_email'] : 'N/A'; ?></li>
                            </ul>
                        </div> 
                        <div class="invoice-head-bottom-right">
                            <ul class="text-end">
                                <li class='text-bold'>Pay To:</li>
                                <li>KiddoSmart SDN BHD.</li>
                                <li>0324885742</li>
                                <li>kiddosmart@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="overflow-view">
                    <div class="invoice-body">
                        <table>
                            <thead>
                                <tr>
                                    <td class="text-bold">Product</td>
                                    <td class="text-bold">Description</td>
                                    <td class="text-bold">Price</td>
                                    <td class="text-bold">Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo isset($orderPackage['packageID']) ? $orderPackage['packageID'] : 'N/A'; ?></td>
                                    <td><?php echo isset($package['packageName']) ? $package['packageName'] : 'N/A'; ?></td>
                                    <td>RM<?php echo isset($package['packagePrice']) ? $package['packagePrice'] : 'N/A'; ?></td>
                                    <td class="text-end">RM<?php echo isset($orderPackage['totalPrice']) ? $orderPackage['totalPrice'] : 'N/A'; ?></td>
                                </tr>
                                <!-- Additional rows if needed -->
                            </tbody>
                        </table>
                        <div class="invoice-body-info-item">
                            <div class="info-item-td text-end text-bold">Total:</div>
                            <div class="info-item-td text-end">RM<?php echo isset($orderPackage['totalPrice']) ? $orderPackage['totalPrice'] : 'N/A'; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invoice-foot text-center">
                <p><span class="text-bold">NOTE:&nbsp;</span>This is a computer-generated receipt and does not require a physical signature.</p>
                <div class="invoice-btns">
                    <a href="ViewPurchase.php" class="invoice-btn"><i class="fas fa-arrow-left"></i> Back</a>
                    <a href="MainPageKS.php" class="invoice-btn"><i class="fas fa-home"></i> Home</a>
                    <a href="#" class="invoice-btn" onclick="window.print()"><i class="fas fa-print"></i> Print</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printInvoice(){
            window.print();
        }
    </script>
</body>
</html>


